<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace App\Middleware;

class JsonResponseMiddleware {

    public static function handle($request, $response, $next)
    {
        if (!headers_sent() && !isset($response['Content-Type'])) {
            header('Content-Type: application/json');
        }

        return $next($request, $response);
    }

    // Method untuk mengatur header
    public static function setResponse($type, $value)
    {
        if (isset($type)) {
            header("{$type}: {$value}");
        }
    }
}