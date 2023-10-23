<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace App\Middleware;

use Core\Headers;

class JsonResponseMiddleware extends Headers  {

    public static function handle($type, $value)
    {
        $headers = self::getallheaders();
        if (isset($headers['X-Api-Key'])) {
            header("{$type}: {$value}");
        }
    }
}