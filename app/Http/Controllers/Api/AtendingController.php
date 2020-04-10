<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Turn;
use App\Service;
use App\Module;
use App\Diligence;
use PhpParser\Node\Stmt\Foreach_;

class AtendingController extends AppBaseController
{
    public function getData($diligence_id,$module_id){
        Log::info('Api\AtendingController@takeATurn');
        Log::info($diligence_id);
        Log::info($module_id);
        $turns = [];

        $turns = DB::table('turns AS t')
        ->select(
            't.id as turn_id', 't.end_atention', 't.is_active', 't.created_at as printed_at', 't.service_id', 't.consecutive_string',
            'dmt.diligence_id', 'dmt.module_id', 'dmt.time_atention', 'dmt.end_atention'
        )
        ->Join('diligences_modules_turns AS dmt','dmt.turn_id','=', 't.id')
        ->whereRaw('t.is_active = 1
        AND dmt.diligence_id = '.$diligence_id.' 
        AND (dmt.module_id = '.$module_id.' or dmt.module_id is null)')
        ->get();

        // dump($turns);

        // foreach ($turns as $key => $value) {
        //     dump($value);
        // }

        return response()->json(["turns"=>$turns], 200);

    }
}
