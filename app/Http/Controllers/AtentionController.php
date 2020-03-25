<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class AtentionController extends Controller
{
    public function index(Request $request){
       
        $services = Service::all();
        $module = Auth::User()->module()->with('diligences')->get()[0];
        // dd($module);

        return view('turns.atention', compact('services','module'));
    }
    
}