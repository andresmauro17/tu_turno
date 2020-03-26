<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Turn;
use App\Service;

class KioskController extends AppBaseController
{
    public function takeATurn(Request $request){
        Log::info('Api\KioskController@takeATurn');
        // Log::info($request);
        
        $service = Service::find($request->id);

        $turno = New Turn;
        $turno->is_active = true;
        $turno->service_id = $service->id;
        $turno->consecutive_string = $service->short_name.strval( $service->consecutive_number + 1 );
        $turno->save();

        
        $service->consecutive_number = $service->consecutive_number + 1;
        $service->save();

        
        return response()->json($turno, 200);

    }
}
