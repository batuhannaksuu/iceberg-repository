<?php

namespace App\Helpers;

class ResponseHelper
{
    /**
     * @param bool $success
     * @param string $message
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse(bool $success,string $message,$data,int $code = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ],$code);
    }

    /**
     * @param bool $success
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse(bool $success,string $message,int $code = 400)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
        ],$code);
    }
}
