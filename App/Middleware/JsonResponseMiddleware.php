<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace App\Middleware;

class JsonResponseMiddleware {

    public static function handle($type, $value)
    {
        if (isset($type)) {
            header("{$type}: {$value}");
        }
    }
}