<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;

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

        if ($admin) {
             $quizName=request('quiz');
             $category_id=request('category_id');

            if ($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz=new Quiz();
                $quiz->name=$quizName;
                $quiz->category_id=$category_id;
                if ($quiz->save()) {
                    Session::put('quizDetails',$quiz);
                }
            }

            return view('add-quiz', ['name' => $admin->name, 'categories' => $categories]);
        } else {
            return redirect('admin-login');
        }
    }
}
