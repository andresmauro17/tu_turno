<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Diligence;

class DiligencesController extends AppBaseController
{
    public function destroy($id)
    {
        Log::info("estoy vivo");
        Log::info($id);
        
        $diligence = Diligence::find($id);
        $diligence->delete();

        return response()->json(['respuesta'=>'Mi respuesta de borrado']);
    }
}