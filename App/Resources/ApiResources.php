<?php
namespace App\Resources;

class ApiResources {

	public static function createSuccessResponse($message, $data)
    {
        return [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
    }

    public static function createErrorResponse($message)
    {
        return [
            'success' => false,
            'message' => $message
        ];
    }

    public static function responseNoStatusMessage($data)
    {
        return [
            'result' => $data
        ];
    }

}