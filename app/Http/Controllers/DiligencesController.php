<?php

namespace App\Http\Controllers;

use App\Diligence;
use App\Module;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorsDiligenceRequest;

class DiligencesController extends Controller
{
    public function index(Request $request)
    {
        $modules = Module::all();
        $diligences = Diligence::all();
        return view('diligences.index', compact('diligences', 'modules'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('diligences.create', compact('modules'));
    }

    public function store(ErrorsDiligenceRequest $request)
    {
        $diligence = new Diligence();
        $diligence -> name = $request->input('name');
        $diligence -> save();

        return redirect()->route('diligences.index')->with('status', 'Tramite Creado Satisfactoriamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $diligence = Diligence::find($id);
        return view('diligences.edit', compact('diligence'));
    }

    public function update(ErrorsDiligenceRequest $request, $id)
    {
        $diligence = Diligence::find($id);
        $diligence -> name = $request->input('name');
        $diligence -> save();

        return redirect()->route('diligences.index')->with('status', 'Tramite Actualizado Satisfactoriamente');
    }

    public function destroy($id)
    {
        //
    }
}
