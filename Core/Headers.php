<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
**/

namespace Core;

class Headers {

    public static function getAllHeaders() {
        return getallheaders();
    }

    public static function getApiKey() {
        $headers = self::getAllHeaders();
        return isset($headers['Key']) ? $headers['Key'] : $headers['X-Api-Key'];
    }
}