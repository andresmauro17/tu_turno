<?php

namespace App\Http\Controllers;
use App\Service;
use App\Turn;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function imprimir(Request $request){
        $services = Service::all();
        $turn = Turn::orderBy('id','desc')->first();
        // dd($turn);
        //$today = Carbon::now()->format('d/m/Y');
        // $pdf = \PDF::loadView('imprimir', compact('today'));
        $pdf = \PDF::loadView('pdf', compact('services','turn'));
        $pdf -> setPaper('a4', 'landscape');
        return $pdf->stream('turno.pdf');
   }
}
