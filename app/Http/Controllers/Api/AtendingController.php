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

    public function nextTurn(Request $request){
        Log::info("nexTurn");
        Log::info($request);
        // Log::info($request->current_diligence);
        
        $currentTurnAtending = Diligence::find($request->current_diligence)
            ->turns
            ->where('pivot.module_id',$request->module)
            ->first()
            ;
        Log::info("currentTurnAtending");
        Log::info($currentTurnAtending);
        
        if($request->current_diligence == Null){
            return response()->json(["message"=>"debe seleccionar una diligencia"], 200);
        }
        else if($currentTurnAtending){
            Log::info("dentro del if");
            Log::info($currentTurnAtending);
            return response()->json(["message"=>"existen turnos que debe solucionar"], 200);
        }else{

            $turn = Diligence::find($request->current_diligence)
            ->turns
            ->where('pivot.module_id',null)
            ->first()
            ;
    
            Log::info($currentTurnAtending);
            if($turn){
                Log::info($turn->id);
        
                $diligence = Diligence::find($request->current_diligence);
                $response = $diligence->turns()->updateExistingPivot($turn->id, ['module_id' => $request->module]);
                
                Log::info($response);
                Log::info($turn);

                return response()->json([], 200);
            }
        }


    }
    
    public function atendTurn(Request $request){
        Log::info("atendTurn");
        Log::info($request);

        $module = Module::find($request->module);
        $currentTurnAtending = $module->turns;

        if($request->current_diligence == Null){
            return response()->json(["message"=>"debe seleccionar una diligencia"], 200);
        }
        else if($currentTurnAtending){
            Log::info("dentro del if");
            Log::info($currentTurnAtending);
            // return response()->json(["message"=>"existen turnos que debe solucionar"], 200);
        }


    }

    public function finishTurn(Request $request){
        Log::info("finishturn");
        Log::info($request);
    }

    public function cancelTurn(Request $request){
        Log::info("cancelTurn");
        Log::info($request);
    }

}
