<?php

namespace App\Http\Controllers;

class SiteController extends Controller{
    public function index(){
        $nome = 'Wagner';
        $habits = ['Estudar', 'Jogar', 'Anime'];
        return view('home', ['nome' => $nome, 'habits' => $habits]);
    }
}