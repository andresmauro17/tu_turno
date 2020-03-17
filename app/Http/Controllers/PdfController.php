<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function imprimir(Request $request){
        $services = Service::all();
        //$today = Carbon::now()->format('d/m/Y');
        // $pdf = \PDF::loadView('imprimir', compact('today'));
        $pdf = \PDF::loadView('pdf', compact('services'));

        return $pdf->stream('turno.pdf');
   }

   public function index(Request $request){
       $services = Service::all();
       return view('pdf', compact('services'));
   }
}
