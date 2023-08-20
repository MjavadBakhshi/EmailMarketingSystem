<?php

namespace App\Http\API\Controllers\Shared;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function successResponse(array $data = [])
    {
        return response()->json([
            'ok' => true,
            'data' => $data
        ]);
    }

    function failedResponse(string $message = '')
    {
        return response()->json([
            'ok' => false,
            'message' => $message
        ]);
    }
}
