<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

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
        $admin = Session::get('admin');
        if ($admin) {
            return view('categories', ['name' => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout(){
        $admin = Session::forget('admin');
        return redirect('admin-login');
    }
}
