<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index', [
            'title' => 'Sign in'
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|min:4|max:255',
            'password' => 'required|min:4|max:255'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Failed Sign in!');

        // dd('Berhasil');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
