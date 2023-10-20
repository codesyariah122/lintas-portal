<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace App\Middleware;

class JsonResponseMiddleware {

    public static function handle($request, $response, $next)
    {

        $response = $next($request, $response);

        return $next($request, $response);
    }

    public static function setResponse($type, $value)
    {
        if(isset($type)):
            header("{$type}: {$value}");
        endif;
    }
}