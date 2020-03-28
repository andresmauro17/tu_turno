<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Module;

class ModulesController extends AppBaseController
{
    public function destroy($id)
    {
        Log::info("estoy vivo");
        Log::info($id);

        $module = Module::find($id);
        $module->delete();

        return response()->json(['respuesta'=>'Mi respuesta de borrado']);
    }
}
