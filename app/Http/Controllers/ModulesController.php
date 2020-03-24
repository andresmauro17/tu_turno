<?php

namespace App\Http\Controllers;

use App\Module;
use App\Diligence;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::with('user', 'diligences')->get();
        
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $diligences = Diligence::all();
        $diligences = Diligence::orderBy('name')->get();

        return view('modules.create', compact('diligences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        
        // $module = Module::findOrFail(1);
        // $module->diligences()->attach(1);

        $module = new Module();
        $module -> name = $request->input('name');
        $module -> is_active = $request->input('is_active');
        $module -> save();
        
        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $module -> diligences()->attach($diligence);
            }
        }
        
        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $diligences = Diligence::all();
        $diligences = Diligence::orderBy('name')->get();
        $module = Module::find($id);
        // $moduleDiligence = $module->diligences()->get();
        //dd($moduleDiligence);
        return view('modules.edit', compact('module', 'diligences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::find($id);
        $module -> name = $request->input('name');
        $module -> is_active = $request->input('is_active');
        $module -> save();

        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $module -> diligences()->sync($diligence);
            }
        }
        
        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();

        return redirect()->route('modules.index');
    }
}
