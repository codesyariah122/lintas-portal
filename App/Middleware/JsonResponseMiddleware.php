<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace App\Middleware;

class JsonResponseMiddleware {

    public static function handle($type, $value)
    {
        $headers = getallheaders();
        if (isset($headers['X-Api-Key'])) {
            header("{$type}: {$value}");
        }
    }
}