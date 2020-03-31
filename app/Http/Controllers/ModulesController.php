<?php

namespace App\Http\Controllers;

use App\Module;
use App\Diligence;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorsModuleRequest;

class ModulesController extends Controller
{
    public function index()
    {
        $modules = Module::with('user', 'diligences')->get();
        // dump($modules);
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        $users = User::all();
        $diligences = Diligence::orderBy('name')->get();

        return view('modules.create', compact('diligences', 'users'));
    }

    public function store(ErrorsModuleRequest $request)
    {       
        // $module = Module::findOrFail(1);
        // $module->diligences()->attach(1);
        $users = User::all();

        $module = new Module();
        $module -> name = $request->input('name');
        $module -> description = $request->input('description');
        $module -> is_active = $request->input('is_active');
        $module -> user_id = $request->input('user_id');
        $module -> save();
        
        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $module -> diligences()->attach($diligence);
            }
        }
        
        return redirect()->route('modules.index', compact('users'))->with('status', 'Modulo Creado Satisfactoriamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::all();
        $diligences = Diligence::orderBy('name')->get();
        $module = Module::find($id);
        // $moduleDiligence = $module->diligences()->get();
        //dd($moduleDiligence);
        return view('modules.edit', compact('module', 'diligences', 'users'));
    }

    public function update(ErrorsModuleRequest $request, $id)
    {
        $module = Module::find($id);
        $module -> name = $request->input('name');
        $module -> description = $request->input('description');
        $module -> is_active = $request->input('is_active');
        $module -> user_id = $request->input('user_id');
        $module -> save();

        $diligences_all = Diligence::all();

        $diligences_exist = $module->diligences;

        $diligences_selected = collect($request->input('diligences'));
        // dump($diligences_selected);

            foreach ($diligences_all as $position => $diligence) {
                // dump("-------------------");
                $diligences_exist_found = $diligences_exist->find($diligence->id);

                $diligences_selected_found_position = null;
                $diligences_selected_found_position = $diligences_selected->search($diligence->id);
                // $diligences_selected_found_position = false;

                $diligences_selected_found = null;
                if(is_numeric($diligences_selected_found_position)){
                    // dump("entro");
                    $diligences_selected_found = $diligences_selected[ $diligences_selected_found_position ];
                }
                
                
                
                // dump("diligence->name");
                // dump($diligence->name);

                // dump("diligences_exist_found");
                // dump($diligences_exist_found);

                // dump("diligences_selected_found_position");
                // dump($diligences_selected_found_position);

                // dump("diligences_selected_found");
                // dump($diligences_selected_found);
                if($diligences_exist_found && $diligences_selected_found){
                    // dump("IF");
                }elseif($diligences_exist_found && !$diligences_selected_found){
                    $module -> diligences()->detach($diligence->id);
                    // dump("ElseID");
                }elseif(!$diligences_exist_found && $diligences_selected_found){
                    // dump("ElseIf 2");
                    $module -> diligences()->attach($diligence->id);
                }
                
            }
            // dd("Stop");
        return redirect()->route('modules.index')->with('status', 'Modulo Actualizado Satisfactoriamente');
    }

    public function destroy($id)
    {
        //
    }
}
