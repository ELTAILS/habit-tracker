<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CadastrarController extends Controller
{
    public function index(){
        return view('cadastrar');
    }

    public function cadastrar(CadastrarRequest $request): RedirectResponse{
        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        Auth::login(($user));

        return redirect()->route('dashboard');

    }

}
