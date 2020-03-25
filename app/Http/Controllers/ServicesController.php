<?php

namespace App\Http\Controllers;

use App\Service;
use App\Diligence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info('hi from index');
        $services = Service::with('diligences')->get();
        // return response()->json($services);
        return view('services.index', compact('services', 'diligences'));
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

        return view('services.create', compact('diligences'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service -> name = $request->input('name');
        $service -> short_name = $request->input('short_name');
        $service -> description = $request->input('description');
        $service -> is_active = $request->input('is_active');
        // $service -> order = $request->input('order');
        //$is_active = Input::has('is_active')? true : false;
        $service -> save();

        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $service -> diligences()->attach($diligence);
            }
        }

        //return $request;
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::info('hi from show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diligences = Diligence::orderBy('name')->get();
        $service = Service::find($id);
        return view('services.edit', compact('service', 'diligences'));
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
        $service = Service::find($id);
        $service -> name = $request->input('name');
        $service -> short_name = $request->input('short_name');
        $service -> description = $request->input('description');
        $service -> is_active = $request->input('is_active');
        $service -> save();

        $diligences = $request->input('diligences');
        if ($diligences) {
            foreach ($diligences as $position => $diligence) {
                $service -> diligences()->sync($diligence);
            }
        }
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('hi from destory');
        // $service = Service::find($id);
        // // $service->delete();
        // return response()->json($service);
        // return redirect()->route('services.index');
    }
}
