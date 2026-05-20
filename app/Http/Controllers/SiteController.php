<?php

namespace App\Http\Controllers;

class SiteController extends Controller{
    public function index(){
        return view('home');
    }

    public function dashboard(){
        return view('dashboard');
    }

}
