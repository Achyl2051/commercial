<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        return view('users.');
    }


    public function register()
    {
        return view('users.register');
    }

    public function login()
    {
        return view('users.login ');
    }

    public function handleRegistration(User $user, CreateUserRequest $request)
    {
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->motdepasse);

        $user->save();

        return redirect('/')->with('success', 'votre a ete creer');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        } else {
            return redirect()->back()->with('error','Information de connexion non reconnue');
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
