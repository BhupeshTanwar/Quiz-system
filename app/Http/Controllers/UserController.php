<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('mcq-page');
    }
}
