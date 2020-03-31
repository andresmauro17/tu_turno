<?php

namespace App\Http\Controllers;

use App\User;
use App\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorsUserRequest;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('users.create', compact('modules'));
    }

    public function store(ErrorsUserRequest $request)
    {
        $user = new User();
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = bcrypt($request->input('password'));
        $user -> remember_token = Str::random(60);
        $user -> is_active = $request->input('is_active');
        $user -> save();

        return redirect()->route('users.index')->with('status', 'Usuario Creado Satisfactoritamente');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $modules = Module::all();
        // $user = User::find($id);
        return view('users.edit', compact('user', 'modules'));
    }

    public function update(ErrorsUserRequest $request, $id)
    {
        $user = User::find($id);
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = bcrypt($request->input('password'));
        $user -> remember_token = Str::random(60);
        $user -> is_active = $request->input('is_active');

        $user -> save();

        return redirect()->route('users.index')->with('status', 'Usuario Actualizado Satisfactoriamente');
    }

    public function destroy($id)
    {
        //
    }
}
