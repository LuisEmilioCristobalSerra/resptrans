<?php

namespace App\Helpers;

class JsonResponse
{
    public static function sendResponse($result, $message = 'Request successfully completed', $code = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response, $code);
    }

    public static function sendError($errorMessage = 'An error has occurred', $code = 202, $errors = [])
    {
        $response = [
            'success' => false,
            'message' => $errorMessage,
            'data' => [
                'errors' => $errors
            ],
        ];

        return response()->json($response, $code);
    }
}
