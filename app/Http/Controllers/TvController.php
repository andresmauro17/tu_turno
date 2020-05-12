<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tv;
use App\Module;
use App\Service;

class TvController extends Controller
{
    public function index(){
        $tv_info = Tv::all();
        $modules = Module::all();
        $services = Service::all();
        $turnstotales = 0;
        $turnos_maximos = $tv_info[0]->turn_max;

        foreach($services as $service){
            $turnstotales+=$service->consecutive_number;
        };
        
        return view('tv.index',compact('tv_info', 'modules', 'turnstotales', 'turnos_maximos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {        
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tv = Tv::find($id);
        return view('tv.edit', compact('tv'));
    }

    public function update(Request $request, $id)
    {
        $tv = Tv::find($id);
        $tv -> message = $request->input('message');
        // https://www.youtube.com/embed/l-aS0XSmShM?loop=1&playlist=l-aS0XSmShM&autoplay=1
        $tv -> url = "https://www.youtube.com/embed/".$request->input('url')."?loop=1&playlist=".$request->input('url')."&autoplay=1";
        $tv -> turn_max = $request->input('turn_max');
        $tv -> save();

        return redirect()->route('tv.index');
        
    }
    
}
