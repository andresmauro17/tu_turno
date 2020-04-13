<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class AtentionController extends Controller
{
    public function index(Request $request){
        $module = Auth::User()->module()->with('diligences')->get();
        if(count($module)){
            $module = $module[0];
            // dd($module->diligences);
            if(count($module->diligences)){
                $services = Service::all();    
                return view('turns.atention', compact('services','module'));
            }else{
                abort(403, 'NO EXISTEN TRAMITES, asociados a este modulo!');
            }
        }else{
            abort(403, 'NO EXISTEN MODULOS, asociados a este usuario!');
        }
    }
    
}