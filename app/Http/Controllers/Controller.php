<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function createSuccessResponse($data, $codigo) {
        return response()->json(['data' => $data], $codigo);
    }

    public function createErrorResponse($mensaje, $codigo) {
        return response()->json(['message' => $mensaje, 'code' => $codigo], $codigo);
    }
}
