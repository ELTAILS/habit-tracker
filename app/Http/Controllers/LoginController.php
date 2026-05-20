<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(loginRequest $request): RedirectResponse{
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'email invalido',
            'password' => 'senha invalida'
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
