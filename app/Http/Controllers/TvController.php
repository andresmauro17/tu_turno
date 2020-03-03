<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TvController extends Controller
{
    public function index(){
        return view('tv.index');
    }
    
}
