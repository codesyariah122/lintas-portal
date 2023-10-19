<?php
namespace Core;

use System\ApiSystem;

abstract class RequestApi implements RequestApiInterface {

    public static function getRequestHttp($url, $apiKey, $type) {
        switch($type) {
            case 'curl':
            return ApiSystem::getHttpCurl($url, $apiKey);
            case 'fileContents':
            return ApiSystem::getHttpContents($url);
        }
    }
}