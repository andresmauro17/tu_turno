<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\User;

class UsersController extends AppBaseController
{
    public function destroy($id)
    {
        Log::info("estoy vivo");
        Log::info($id);
        
        $user = User::find($id);
        $user->delete();

        return response()->json(['respuesta'=>'Mi respuesta de borrado']);
    }
}
