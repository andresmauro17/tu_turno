<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;


class AtentionController extends Controller
{
    public function index(Request $request){
       
        $services = Service::all();

        return view('turns.atention', compact('services'));
    }
    
}