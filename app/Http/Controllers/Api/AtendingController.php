<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Turn;
use App\Service;

class AtendingController extends AppBaseController
{
    public function getData(Request $request){
        Log::info('Api\AtendingController@takeATurn');

        $turns = Turn::where('is_active',true);
        $turnsWaiting = $turns->count();

        // Log::info($request);
        
        $response = [
            'turnsWaiting' => $turnsWaiting
        ];
        
        return response()->json($response, 200);

    }
}
