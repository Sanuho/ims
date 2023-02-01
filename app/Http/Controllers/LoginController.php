<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request){
        $credentials= $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        $remember = $request->get('remember');
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        
        return back()->with('loginFailed','Login failed!');
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
