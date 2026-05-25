<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CadastrarController extends Controller
{
    public function index(): View{
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
