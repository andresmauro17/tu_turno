<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\ResponseUtil;

class AppBaseController extends Controller
{
    /**
     * @param $result
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message = '', $code = 200)
    {
        return response()->json(ResponseUtil::makeResponse($message, $result), $code);
    }

    /**
     * @param string $message
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendErrorResponse($message, $data = [], $code = 500)
    {
        return response()->json(ResponseUtil::makeError($message, $data), 422);
    }

}