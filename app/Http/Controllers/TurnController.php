<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('kiosko.index', compact('services'));
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
