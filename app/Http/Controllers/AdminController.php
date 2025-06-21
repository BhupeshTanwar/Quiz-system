<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;

class AdminController extends Controller
{
    //
    function login(Request $req)
    {
        $validation = $req->validate([
            "name" => "required",
            "password" => "required"
        ]);

        $admin = Admin::where([
            ['name', '=', $req->name],
            ['password', '=', $req->password]
        ])->first();

        if (!$admin) {
            $validation = $req->validate(
                [
                    "user" => "required",
                ],
                [
                    "user.required" => "User does not exist.",
                ]
            );
        }

        Session::put('admin', $admin);
        return redirect('dashboard');
    }

    function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin', ['name' => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }

    function categories()
    {
        $categories = Category::get();
        $admin = Session::get('admin');
        if ($admin) {
            return view('categories', ['name' => $admin->name, 'categories' => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        $admin = Session::forget('admin');
        return redirect('admin-login');
    }

    function addCategory(Request $req)
    {
        $validation = $req->validate([
            "category" => "required |min:3 |max:50 |unique:categories,name"
        ]);

        $admin = Session::get('admin');
        $category = new Category();
        $category->name = $req->category;
        $category->creator = $admin->name;

        if ($category->save()) {
            Session::flash('category', "Success : Category " . $req->category . " Added");
        }

        return redirect("admin-categories");
    }

    function deleteCategory($id)
    {
        $isDeleted = Category::find($id)->delete();
        if ($isDeleted) {
            Session::flash('category', "Success : Category is Deleted");
            return redirect("admin-categories");
        }
    }

    function addQuiz()
    {
        $categories = Category::get();
        $admin = Session::get('admin');
        $totalMCQs = 0;

        if ($admin) {
            $quizName = request('quiz');
            $category_id = request('category_id');

            if ($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                }
            } else {
                $quiz = Session::get('quizDetails');
                $totalMCQs =$quiz && Mcq::where('quiz_id', $quiz->id)->Count();
            }

            return view('add-quiz', ['name' => $admin->name, 'categories' => $categories, 'totalMCQs' => $totalMCQs]);
        } else {
            return redirect('admin-login');
        }
    }

    function addMCQs(Request $req)
    {
        $req->validate([
            "question" => "required | min:5",
            "a" => "required ",
            "b" => "required ",
            "c" => "required ",
            "d" => "required ",
            "correct_ans" => "required ",
        ]);

        $mcq = new Mcq();
        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq->question = $req->question;
        $mcq->a = $req->a;
        $mcq->b = $req->b;
        $mcq->c = $req->c;
        $mcq->d = $req->d;
        $mcq->correct_ans = $req->correct_ans;

        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;

        if ($mcq->save()) {
            if ($req->submit == "add-more") {
                return redirect(url()->previous());
            } else {
                $quiz = Session::forget('quizDetails');
                return redirect('/admin-categories');
            }
        }
    }

    function endQuiz()
    {
        $quiz = Session::forget('quizDetails');
        return redirect('/admin-categories');
    }

    function showQuiz($id)
    {
        $admin = Session::get('admin');
        $mcqs=Mcq::where('quiz_id',$id)->get();
        if ($admin) {
            return view('show-quiz', ['name' => $admin->name, 'mcqs' => $mcqs]);
        } else {
            return redirect('admin-login');
        }
        //return "yes";
    }
}
