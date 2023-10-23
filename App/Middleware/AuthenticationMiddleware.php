<?php

namespace App\Middleware;

use System\GateAccessUserSystem;
use Core\Headers;
use App\Models\LoginModel;

class AuthenticationMiddleware extends GateAccessUserSystem {


    public static function handle() 
    {   
        session_start();

        $headers = Headers::getallheaders();
        $authorizationHeader = $headers['Authorization'] ?? '';

        if (empty($authorizationHeader) || !str_starts_with($authorizationHeader, 'Bearer ')) {
            throw new \Exception('Autentikasi gagal', 401);
        }

        $accessToken = substr($authorizationHeader, 7);
        if (!self::validateAccessToken($accessToken)) {
            throw new \Exception('Autentikasi gagal', 401);
        }

        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');

        $hasAccess = self::hasAccess(['uri' => $uri, 'accessToken' => $accessToken]);

        if(!$hasAccess) {
            throw new \Exception('Forbaiden if your not owner !', 401);
        }

    }

    private static function validateAccessToken($accessToken) {
        $userLoginData = LoginModel::findToken($accessToken);
        return $userLoginData;
    }

    public static function setResponse($type, $value)
    {
        if (isset($type)) {
            header("{$type}: {$value}");
        }
    }

}