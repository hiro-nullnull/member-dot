<?php


namespace App\Http\Controllers;


use Illuminate\Http\Response;

trait WebApi
{
    private $RESPONSE_STATUS_SUCCESS = 0;
    private $RESPONSE_STATUS_FAILURE = -1;

    protected function success($responseData)
    {
        return response()->json([
            'status' => $this->RESPONSE_STATUS_SUCCESS,
            'data' => $responseData
        ], Response::HTTP_OK);
    }

    protected function faliure($responseData)
    {
        return response()->json([
            'status' => $this->RESPONSE_STATUS_FAILURE,
            'data' => $responseData
        ], Response::HTTP_OK);
    }
}
