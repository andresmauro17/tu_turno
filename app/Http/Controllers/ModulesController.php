<?php

namespace App\Http\Controllers;

use App\Module;
use App\Diligence;
use App\User;
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
        // dd($modules);
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $diligences = Diligence::orderBy('name')->get();

        return view('modules.create', compact('diligences', 'users'));
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
        
        return redirect()->route('modules.index', compact('users'));
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
        $users = User::all();

        $diligences = Diligence::orderBy('name')->get();
        $module = Module::find($id);
        // $moduleDiligence = $module->diligences()->get();
        //dd($moduleDiligence);
        return view('modules.edit', compact('module', 'diligences', 'users'));
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
        $module -> description = $request->input('description');
        $module -> is_active = $request->input('is_active');
        $module -> user_id = $request->input('user_id');
        $module -> save();

        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $module -> diligences()->attach([$diligence,]);
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
