<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Turn;
use App\Service;
use App\Diligence;

class KioskController extends AppBaseController
{
    public function takeATurn(Request $request){
        Log::info('Api\KioskController@takeATurn');
        Log::info($request);
        
        $service = Service::find($request->id);
        
        $diligenceFirst = $service->diligences->first();
        Log::info($diligenceFirst->name);

        if(!$diligenceFirst){
            return response()->json(["message"=>"debe asignar una diligencia"], 200);
        }

        $turno = New Turn;
        $turno->is_active = true;
        $turno->service_id = $service->id;
        $turno->consecutive_string = $service->short_name.strval( $service->consecutive_number + 1 );
        $turno->save();


        DB::table('diligences_modules_turns')->insert([
            'turn_id'           => $turno->id,
            'diligence_id'          => $diligenceFirst->id,
            'created_at' => \Carbon\Carbon::now()
        ]);

        
        $service->consecutive_number = $service->consecutive_number + 1;
        $service->save();

        
        return response()->json($turno, 200);

    }
}
