<?php

namespace App\Http\Controllers;

use App\Service;
use App\Diligence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ErrorsServiceRequest;

class ServicesController extends Controller
{
    public function index()
    {
        Log::info('hi from index');
        $services = Service::with('diligences')->get();
        return view('services.index', compact('services', 'diligences'));
    }

    public function create()
    {
        $diligences = Diligence::orderBy('name')->get();

        return view('services.create', compact('diligences'));
        
    }

    public function store(ErrorsServiceRequest $request)
    {        
        $service = new Service();
        $service -> name = $request->input('name');
        $service -> short_name = $request->input('short_name');
        $service -> description = $request->input('description');
        $service -> is_active = $request->input('is_active');
        $service -> save();

        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $service -> diligences()->attach($diligence);
            }
        }

        return redirect()->route('services.index')->with('status', 'Servicio Creado Satisfactoriamente');
    }

    public function show($id)
    {
        Log::info('hi from show');
    }

    public function edit($id)
    {
        $diligences = Diligence::orderBy('name')->get();
        $service = Service::find($id);
        return view('services.edit', compact('service', 'diligences'));
    }

    public function update(ErrorsServiceRequest $request, $id)
    {
        
        $service = Service::find($id);
        $service -> name = $request->input('name');
        $service -> short_name = $request->input('short_name');
        $service -> description = $request->input('description');
        $service -> is_active = $request->input('is_active');
        $service -> save();

        $diligences_all = Diligence::all();

        $diligences_exist = $service->diligences;

        $diligences_selected = collect($request->input('diligences'));

            foreach ($diligences_all as $position => $diligence) {

                $diligences_exist_found = $diligences_exist->find($diligence->id);

                $diligences_selected_found_position = null;

                $diligences_selected_found_position = $diligences_selected->search($diligence->id);

                $diligences_selected_found = null;

                if(is_numeric($diligences_selected_found_position)){

                    $diligences_selected_found = $diligences_selected[ $diligences_selected_found_position ];
                }
                
                if($diligences_exist_found && $diligences_selected_found){
                    
                }elseif($diligences_exist_found && !$diligences_selected_found){

                    $service -> diligences()->detach($diligence->id);
                    
                }elseif(!$diligences_exist_found && $diligences_selected_found){
                    
                    $service -> diligences()->attach($diligence->id);
                }
                
            }
        return redirect()->route('services.index')->with('status', 'Servicio Actualizado Satisfactoriamente');
    }

    public function destroy($id)
    {
        //
    }
}
