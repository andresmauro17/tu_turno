<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\ErrorsClientRequest;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ErrorsClientRequest $request)
    {        
        $client = new Client();
        $client -> name = $request->input('name');
        $client -> lastname = $request->input('lastname');
        $client -> type_dni = $request->input('type_dni');
        $client -> dni = $request->input('dni');        
        $client -> sex = $request->input('sex');
        $client -> is_active = $request->input('is_active');
        $client -> save();

        return redirect()->route('clients.index')->with('status', 'Cliente Creado Satisfactoriamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(ErrorsClientRequest $request, $id)
    {
        $client = Client::find($id);
        $client -> name = $request->input('name');
        $client -> lastname = $request->input('lastname');
        $client -> type_dni = $request->input('type_dni');
        $client -> dni = $request->input('dni');
        $client -> sex = $request->input('sex');
        $client -> is_active = $request->input('is_active');
        $client -> save();

        return redirect()->route('clients.index')->with('status', 'Cliente Actualizado Satisfactoriamente');
        
    }

    public function destroy($id)
    {
        //
    }
}
