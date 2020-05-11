<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\ErrorsCompanyRequest;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();
        // dd($companies);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        //
    }

    public function store(ErrorsCompanyRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    public function update(ErrorsCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company -> name = $request->input('name');
        $company -> nit = $request->input('nit');
        $company -> address = $request->input('address');
        $company -> phone_number = $request->input('phone_number');
        $company -> save();

        return redirect()->route('company.index')->with('status', 'Empresa Actualizada Satisfactoriamente');
    }

    public function destroy($id)
    {
        //
    }
}
