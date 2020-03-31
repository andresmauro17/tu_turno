<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Module;

class TvController extends Controller
{
    public function index(){
        $modules = Module::all();
        
        return view('tv.index',compact('modules'));
    }
    
}
