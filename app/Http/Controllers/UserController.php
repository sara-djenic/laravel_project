<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view("users/registration");
    }

    public function create()
    {
        request()->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
            "password_confirmation" => "required"
        ]);

        $uname = request()->name;
        $email = request()->email;
        $pass = md5(request()->password);

        $created = User::create(["name" => $uname, "email" => $email, "password" =>$pass, "role" => "user"]);

        if($created)
        {
            session()->flash('success', "Register ok");
            return redirect()->back();

        }else{
            session()->flash('errors', 'Creating user failed');
            return redirect()->back();
        }

    }
    public function login()
    {
        request()->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $username = request()->username;
        $password = md5(request()->password);

        $user = User::where(["name"=> $username, "password"=>$password])->first();

        if(!empty($user))
        {
            session()->put("user", $user);
            return redirect("/");
        }else{
            session()->flash('error', 'Wrong username or password');
            return redirect()->back();
        }

    }
    public function logout()
    {
        session()->forget("user");
        session()->flush();
        return redirect("/");
    }
    public function showForm()
    {
        return view("users/login");
    }

}
