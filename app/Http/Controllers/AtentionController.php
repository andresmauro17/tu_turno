<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class AtentionController extends Controller
{
    public function index(Request $request){

        if(count(Auth::User()->module()) == 0){
            dd('chupapijas');
            $services = Service::all();
            $module = Auth::User()->module()->with('diligences')->get()[0];
    
            return view('turns.atention', compact('services','module'));
        }else{
            // dd('no hay nada');
            abort(403, 'No exiten modulos asociados a este usuario!');
        }
       
        
    }
    
}