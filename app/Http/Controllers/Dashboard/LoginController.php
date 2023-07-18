<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function index(){
        return view('app.login.login');
    }

    public function checklogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect(route('login'));
        
    }
    public function registeruser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect(route('login'));
    }
    public function logout(){
       Auth::logout();
       return redirect('/login');
    }
}