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

class TvController extends AppBaseController
{
    public function getData(Request $request){
        
        $modules = DB::table('modules AS m')
        ->select(
            'm.id as module_id', 'm.name as module_name',
            'dmt.id as diligences_modules_turns_id', 'dmt.diligence_id', 'dmt.time_atention','dmt.end_atention','dmt.created_at',
            't.id as turn_id', 't.consecutive_string'
        )
        ->leftJoin('diligences_modules_turns AS dmt','m.id','=', 'dmt.module_id')
        ->join('turns as t', 'dmt.turn_id', '=', 't.id')
        ->whereRaw('m.is_active = 1 and (dmt.time_atention IS null AND dmt.end_atention IS null or (dmt.end_atention IS null))')
        ->get();

        

        // foreach ($modules as $key => $module) {
        //     dump($module);
        // }
        
        // dd('Api\AtendingController@getData');

        // dd($modules);

        return response()->json($modules,200);

    }
}
