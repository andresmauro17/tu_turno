<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Service;

class ServicesController extends AppBaseController
{
    public function reset(Request $request, $id){
        Log::info('Api\ServicesController@reset');
        Log::info($request);
        Log::info($id);
        
        $service = Service::find($id);
        // log::info($service);
        $service->consecutive_number = 0;
        $service->save();

        // dd($service);
        return response()->json($service, 200);     
        
    }
    
    public function destroy($id)  
    {
        Log::info("estoy vivo en service");
        Log::info($id);

        $service = Service::find($id);
        $service->delete();

        return response()->json(['respuesta'=>'Mi respuesta de borrado']);
    }
}