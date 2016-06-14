<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\UserSignupRequest;
use App\Http\Controllers\Controller;
use App\User;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'postLogin']]);
    }

    public function login()
    {
        if (\Auth::user())
            return redirect(route('admin-posts'));
        return view('admin.login');
    }

    public function logout()
    {
        \Auth::logout();

        session()->flash('success', 'You have logged out.');

        return redirect('/admin/login');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            session()->flash('success', 'You are now logged in.');

            return redirect(route('admin-posts'));
        }

        else
        {
            session()->flash('error', 'E-mail or password incorrect.');

            return redirect('/admin/login');
        }
    }

    public function signup(UserSignupRequest $request)
    {
        $user = User::create($request->except(['password_confirmation']));

        session()->flash('success', 
            'Your account was created. You can now login with your email and password.');

        return redirect(route('admin-login'));
    }
}
