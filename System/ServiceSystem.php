<?php
/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
*/

namespace System;
use System\ApiSystem;

class ServiceSystem {

    public static function generateAccess($key, $value)
    {
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');
        if (empty($value)) {
            header("HTTP/1.1 401 Unauthorized");
            $dataResponse = [
                'message' => "Akses ditolak. API_KEY diperlukan untuk mengakses sumber daya ini."
            ];
            ApiSystem::jsonResponseGenerate($dataResponse);
            exit;
        } else {
            $headers = getallheaders();
            if (isset($headers['X-Api-Key']) && $value === $headers['X-Api-Key']) {
                $xApiKey = $headers['X-Api-Key'];
                return;
            } else {
                if($uri !== "/") {
                    header("HTTP/1.1 401 Unauthorized");
                    $dataResponse = [
                        'message' => "Akses ditolak. API_KEY diperlukan untuk mengakses sumber daya ini."
                    ];
                    ApiSystem::jsonResponseGenerate($dataResponse);
                    exit;
                }
            }
        }
    }
}