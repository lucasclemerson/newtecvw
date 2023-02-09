<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    
    public function index (){
        $this->home();
    }

    public function home (){
        return view('home');
    }
}
