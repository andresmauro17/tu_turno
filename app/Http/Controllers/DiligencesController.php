<?php

namespace App\Http\Controllers;

use App\Diligence;
use App\Module;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorsDiligenceRequest;

class DiligencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modules = Module::all();
        $diligences = Diligence::all();
        return view('diligences.index', compact('diligences', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('diligences.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorsDiligenceRequest $request)
    {
        $diligence = new Diligence();
        $diligence -> name = $request->input('name');
        $diligence -> save();

        return redirect()->route('diligences.index')->with('status', 'Tramite Creado Satisfactoriamente');
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
        $diligence = Diligence::find($id);
        return view('diligences.edit', compact('diligence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ErrorsDiligenceRequest $request, $id)
    {
        $diligence = Diligence::find($id);
        $diligence -> name = $request->input('name');
        $diligence -> save();

        return redirect()->route('diligences.index')->with('status', 'Tramite Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diligence = Diligence::find($id);
        $diligence->delete();

        return redirect()->route('diligences.index');
    }
}
