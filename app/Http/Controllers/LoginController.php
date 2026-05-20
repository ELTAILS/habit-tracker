<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse{
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Credenciais invalidas'
        ]);
    }

    public function logout(Request $request): RedirectResponse {
        //desloga o usuario
        Auth::logout();
        //invalidando a session do usuario
        $request->session()->invalidate();
        //Gerando um novo token de session
        $request->session()->regenerateToken();
        //Redirecionando para a home
        return redirect(route('index'));
    }

}
