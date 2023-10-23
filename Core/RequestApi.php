<?php
namespace Core;

use System\ApiSystem;

abstract class RequestApi extends ApiSystem implements RequestApiInterface {

    public static function getRequestHttp($url, $apiKey, $type) {
        switch($type) {
            case 'curl':
            return self::getHttpCurl($url, $apiKey);
            case 'fileContents':
            return self::getHttpContents($url);
        }
    }
}