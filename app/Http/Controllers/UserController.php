<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;
use App\Mail\VerifyUser;
use App\Mail\UserForgotPassword;
use Illuminate\Http\Request;

use function Pest\Laravel\get;
use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    //
    function welcome()
    {
        $categories = Category::withCount('quizzes')->get();
        //$categories=Category::get();
        return view('welcome', ['categories' => $categories]);
    }

    function userQuizList($id, $category)
    {
        $quizData = Quiz::withCount('Mcq')->where('category_id', $id)->get();
        // return $quizData = Quiz::where('category_id', $id)->get();
        return view('user-quiz-list', ['quizData' => $quizData, 'category' => $category]);
    }

    function startQuiz($id, $name)
    {
        $quizCount = Mcq::where('quiz_id', $id)->Count();
        $mcqs = Mcq::where('quiz_id', $id)->get();
        Session::put('firstMCQ', $mcqs[0]);

        $quizName = $name;
        return view('start-quiz', ['quizName' => $quizName, 'quizCount' => $quizCount]);
    }

    function userSignup(Request $req)
    {
        //return $req;
        $validate = $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|email |unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message', "User SignUp Successfully !");
            }
            return redirect('/')->with('message', "User registered Successfully !");
        }
    }

    function userLogout()
    {
        Session::forget('user');
        return redirect('/');
    }

    function userSignupQuiz()
    {
        Session::put('quiz-url', url()->previous());
        return view('user-signup');
    }

    function userLogin(Request $req)
    {
        //return $req;
        $validate = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user || ! Hash::check($req->password, $user->password)) {
            return "User not valid , Please check email and password again !";
        }


        //

        $link = Crypt::encryptString($user->email);
        $link = url('/verify-user/' . $link);
        Mail::to($user->email)->send(new VerifyUser($link));

        //


        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect('/');
        }
    }

    function userLoginQuiz()
    {
        Session::put('quiz-url', url()->previous());
        return view('user-login');
    }

    function mcq($id, $name)
    {
        $record = new Record();
        $record->user_id = Session::get('user')->id;
        $record->quiz_id = Session::get('firstMCQ')->quiz_id;
        $record->status = 1;

        if ($record->save()) {
            $currentQuiz = [];
            $currentQuiz['totalMcq'] = MCQ::where('quiz_id', Session::get('firstMCQ')->quiz_id)->Count();
            $currentQuiz['currentMcq'] = 1;
            $currentQuiz['quizName'] = $name;
            $currentQuiz['quizId'] = Session::get('firstMCQ')->quiz_id;
            $currentQuiz['recordId'] = $record->id;

            Session::put('currentQuiz', $currentQuiz);
            $mcqData = MCQ::find($id);
            return view('mcq-page', ['quizName' => $name, 'mcqData' => $mcqData]);
        } else {
            return "Something went wrong";
        }
    }

    function submitAndNext(Request $req, $id)
    {
        $currentQuiz = Session::get('currentQuiz');
        $currentQuiz['currentMcq'] += 1;
        $mcqData = MCQ::where([
            ['id', '>', $id],
            ['quiz_id', '=', $currentQuiz['quizId']]
        ])->first();

        $isExist = MCQ_Record::where([
            ['record_id', '=', $currentQuiz['recordId']],
            ['mcq_id', '=', $req->id]
        ])->count();

        if ($isExist < 1) {
            $mcq_record = new MCQ_Record();
            $mcq_record->record_id = $currentQuiz['recordId'];
            $mcq_record->user_id = Session::get('user')->id;
            $mcq_record->mcq_id = $req->id;
            $mcq_record->select_answer = $req->option;

            if ($req->option == MCQ::find($req->id)->correct_ans) {
                $mcq_record->is_correct = 1;
            } else {
                $mcq_record->is_correct = 0;
            }

            if (!$mcq_record->save()) {
                return "Something went wrong";
            }
        }



        Session::put('currentQuiz', $currentQuiz);

        if ($mcqData) {
            return view('mcq-page', ['quizName' => $currentQuiz['quizName'], 'mcqData' => $mcqData]);
        } else {
            $resultData = MCQ_Record::WithMCQ()->where('record_id', $currentQuiz['recordId'])->get();
            $correctAnswers = MCQ_Record::where([
                ['record_id', '=', $currentQuiz['recordId']],
                ['is_correct', '=', 1],
            ])->count();

            $record = Record::find($currentQuiz['recordId']);
            if ($record) {
                $record->status = 2;
                $record->update();
            }
            return view('quiz-result', ['resultData' => $resultData, 'correctAnswers' => $correctAnswers]);
        }
    }

    function userDetails()
    {
        $quizRecord = Record::WithQuiz()->where('user_id', Session::get('user')->id)->get();
        return view('user-details', ['quizRecord' => $quizRecord]);
    }

    function searchQuiz(Request $req)
    {
        $quizData = Quiz::withCount('Mcq')->where('name', 'Like', '%' . $req->search . '%')->get();
        return view('quiz-search', ['quizData' => $quizData, 'quiz' => $req->search]);
    }

    function verifyUser($email)
    {
        $orgEmail = Crypt::decryptString($email);
        $user = User::where('email', $orgEmail)->first();
        if ($user) {
            $user->active = 2;
            if ($user->save()) {
                return redirect('/');
            }
        }
    }

    function userForgotPassword(Request $req)
    {
        $link = Crypt::encryptString($req->email);
        $link = url('/user-forgot-password/' . $link);
        Mail::to($req->email)->send(new UserForgotPassword($link));
        return redirect("/");
    }

    function userResetForgotPassword($email)
    {
        $orgEmail = Crypt::decryptString($email);
        return view('user-set-forgot-password', ['email' => $orgEmail]);
    }

    function userSetForgotPassword(Request $req)
    {
        $validate = $req->validate([
            'email' => 'required|email',
            'password' => 'required |min :3 |confirmed'
        ]);

        $user = User::where('email', $req->email)->first();
        if($user){
            $user->password=Hash::make($req->password);
            if($user->save()){
                return redirect('user-login');
            }
            
        }

    }
}
