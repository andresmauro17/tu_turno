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
    public function getData(Request $request,$diligence_id){
        Log::info('Api\AtendingController@takeATurn');
        Log::info($diligence_id);
        
        $diligence = Diligence::find($diligence_id);
        // Log::info($diligence);
        $services = $diligence->services();
        // Log::info($services->get());
        
        // $serviceArray = [];
        // foreach ($services->get() as $key => $service) {
        //     array_push($serviceArray,$service->id);
        // }
       
        // turnos
        // services
        // diligences_services

        // $turns = DB::table('diligences')
        // ->select(
        //     'diligences.id as diligenceId','diligences.name as diligenceName',
        //     'ds.service_id',
        //     's.name as serviceName',
        //     't.id as turnId'
        // )->join('diligences_services as ds','ds.diligence_id','=','diligences.id')
        // ->join('services as s', 's.id', '=', 'ds.service_id')
        // ->leftjoin('turns as t','t.id', '=', 's.id')
        // ->where('diligences.id', $diligence_id)
        // ;

        //  dump('diigence is');
        //  dump($diligence_id);

        $turns = DB::table('turns')
        ->select(
            'turns.id As turnID','turns.consecutive_string As turn','turns.created_at AS  CreatedAt','turns.service_id AS  serviceId',
            'services.name As serviceName',
            'diligences_services.diligence_id As diligenceId'
        )->join('services', 'turns.service_id', '=', 'services.id')
        ->join('diligences_services','diligences_services.service_id', '=' ,'services.id')
        ->where('turns.is_active',true)
        ->where('diligences_services.diligence_id','=', $diligence_id )
        ->orderBy('turns.id','asc')
        ;

        // dump($turns);

        foreach ($turns->get() as $key => $value) {
            dump($value);
        }

        dd('stop');
        

        

        $turns = Turn::where('is_active',true);
        $turnsWaiting = $turns->count();

        // Log::info($request);
        
        $response = [
            'turnsWaiting' => $turnsWaiting
        ];
        
        return response()->json($response, 200);

    }
}
