<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Module;
use App\Service;

class TvController extends Controller
{
    public function index(){
        $modules = Module::all();
        $services = Service::all();
        $turnstotales = 0;

        foreach($services as $service){
            $turnstotales+=$service->consecutive_number;
        };

        return view('tv.index',compact('modules', 'services', 'turnstotales'));
    }
    
}
