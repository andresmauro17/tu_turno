<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlTv extends Controller
{
    public function index(){
        return view('tv.control');
    }
}
