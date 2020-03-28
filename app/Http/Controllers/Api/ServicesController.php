<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Service;

class ServicesController extends AppBaseController
{
    public function destroy($id)
    {
        Log::info("estoy vivo en service");
        Log::info($id);

        $service = Service::find($id);
        $service->delete();

        return response()->json(['respuesta'=>'Mi respuesta de borrado']);
    }
}