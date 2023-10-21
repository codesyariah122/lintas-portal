<?php

namespace App\Middleware;

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
    }

    private static function validateAccessToken($accessToken) {
        // Anda perlu menulis logika untuk memeriksa apakah accessToken adalah valid.
        // Ini bisa mencakup pemeriksaan di database atau sistem otentikasi eksternal.
        // Jika accessToken valid, kembalikan true; jika tidak, kembalikan false.
    }

    public static function setResponse($type, $value)
    {
        if (isset($type)) {
            header("{$type}: {$value}");
        }
    }

}