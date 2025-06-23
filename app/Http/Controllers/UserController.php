<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
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

        $quizData = Quiz::where('category_id', $id)->get();
        return view('user-quiz-list', ['quizData' => $quizData, 'category' => $category]);
    }

    function userSignup(Request $req)
    {
        //return $req;
        $validate = $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
        ]);
    }
}
