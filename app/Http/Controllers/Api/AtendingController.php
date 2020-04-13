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

use Illuminate\Support\Arr;

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
        
        // get turns  where end atention is null and be called or is atending
        $currentTurnAtending = Diligence::find($request->current_diligence)
            ->turns()
            ->where([
                ['turns.is_active', '=', 1],
                ['diligences_modules_turns.module_id', '=', $request->module],
                ['diligences_modules_turns.end_atention', '=', null]
            ])
            ->first()
            ;
        Log::info("currentTurnAtending");
        Log::info($currentTurnAtending);
        
        if($currentTurnAtending){
            Log::info("dentro del if");
            Log::info($currentTurnAtending);
            return response()->json(["message"=>"existen turnos que debe solucionar"], 200);
        }else{

            // get a turn not called
            $turn = Diligence::find($request->current_diligence)
            ->turns()
            ->where([
                ['turns.is_active', '=', 1],
                ['diligences_modules_turns.module_id', '=', null],
                ['diligences_modules_turns.time_atention', '=', null]
            ])
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
        
        // get the turn that is atending
        $calledTurnAtending = Diligence::find($request->current_diligence)
            ->turns()
            ->where([
                ['turns.is_active', '=', 1],
                ['diligences_modules_turns.module_id', '=', $request->module],
                ['diligences_modules_turns.time_atention', '=', null],
                ['diligences_modules_turns.end_atention', '=', null],
            ])
            ->first()
            ;
        
        Log::info($calledTurnAtending);

        
        if($calledTurnAtending){
            Log::info("dentro del if");
            Log::info($calledTurnAtending);

            $diligence = Diligence::find($request->current_diligence);
            $response = $diligence->turns()->updateExistingPivot($calledTurnAtending->id, ['time_atention' => \Carbon\Carbon::now()]);
            
            return response()->json($response, 200);
            
        }else{
            return response()->json(["message"=>"No hay turnos para atender o debe finalizar los que esta atendiendo!"], 200);
        }


    }

    public function finishTurn(Request $request){
        Log::info("finishturn");
        Log::info($request);

        // get the turn that is current atending
        $turnAtending = Diligence::find($request->current_diligence)
            ->turns()
            ->where([
                ['turns.is_active', '=', 1],
                ['diligences_modules_turns.module_id', '=', $request->module],
                ['diligences_modules_turns.time_atention', '<>', null],
                ['diligences_modules_turns.end_atention', '=', null],
            ])
            ->first()
            ;
        
        Log::info($turnAtending);

        if($turnAtending){

            $diligence = Diligence::find($request->current_diligence);
            $response = $diligence->turns()->updateExistingPivot($turnAtending->id, ['end_atention' => \Carbon\Carbon::now()]);
            
            // finish the turn
            $service = Service::find($turnAtending->service_id);
            $diligences = $service->diligences()->get();

            $nextPosition = null;

            foreach ($diligences as $key => $dili) {
                if($dili->id == $diligence->id){
                    $nextPosition = $key + 1;
                }
            }
            Log::info('por que entra al if?');
            Log::info($nextPosition);
            Log::info(count($diligences));


            if($nextPosition != null && !(count($diligences) == $nextPosition)){
            
               $nextDiligenceId = $diligences[$nextPosition]->id;
               DB::table('diligences_modules_turns')->insert([
                    'turn_id'           => $turnAtending->id,
                    'diligence_id'          => $nextDiligenceId,
                    'created_at' => \Carbon\Carbon::now()
                ]);
                Log::info("turno generado exitosamente!!!!!!!!!!!!");
            }else{
                $turnAtending->end_atention = \Carbon\Carbon::now();
                $response = $turnAtending->save();
                Log::info("turno finalizado exitosamente!!!!!!!!!!!!");
            }
            return response()->json([], 200);
        }else{
            return response()->json(["message"=>"No estas atendiendo a nadie aun!"], 200);
        }

    }

    public function cancelTurn(Request $request){
        Log::info("cancelTurn");
        Log::info($request);
    }

}
