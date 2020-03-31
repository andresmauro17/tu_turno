<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Client;

class ClientsController extends AppBaseController
{
    public function destroy($id)
    {
        Log::info("estoy vivo");
        Log::info($id);

        $client = Client::find($id);
        $client->delete();

        return response()->json(['respuesta'=>'Mi respuesta de borrado']);
    }
}
