<?php

namespace App\Http\Controllers;

class SiteController extends Controller{
    public function index(){
        $title = 'Bem vindo ao Habit-tracker';
        $habits = ['Estudar', 'Jogar', 'Anime'];
        return view('home', ['title' => $title, 'habits' => $habits]);
    }
}
