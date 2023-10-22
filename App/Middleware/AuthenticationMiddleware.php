<?php

namespace App\Middleware;

use System\ServiceSystem;

class AuthenticationMiddleware {

    public static function handle() 
    {   
        $headers = getallheaders();
        $authorizationHeader = $headers['Authorization'] ?? '';

        if (empty($authorizationHeader) || !str_starts_with($authorizationHeader, 'Bearer ')) {
            throw new \Exception('Autentikasi gagal', 401);
        }

        $accessToken = substr($authorizationHeader, 7);
        if (!self::validateAccessToken($accessToken)) {
            throw new \Exception('Autentikasi gagal', 401);
        }
        $dataSession = [
            'key' => 'accessToken',
            'value' => $accessToken
        ];
        return ServiceSystem::generateSession($dataSession);

    }

    private static function validateAccessToken($accessToken) {
        if(isset($accessToken)) {
            return true;
        }
    }

    public static function setResponse($type, $value)
    {
        if (isset($type)) {
            header("{$type}: {$value}");
        }
    }

}