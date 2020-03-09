<?php

namespace App\Http\Controllers;

use App\Diligence;
use Illuminate\Http\Request;

class DiligencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diligences = Diligence::all();
        return view('diligences.index', compact('diligences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diligences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diligence = new Diligence();
        $diligence -> name = $request->input('name');
        $diligence -> save();

        return redirect()->route('diligences.index');
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
    public function update(Request $request, $id)
    {
        $diligence = Diligence::find($id);
        $diligence -> name = $request->input('name');
        $diligence -> save();

        return redirect()->route('diligences.index');
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
