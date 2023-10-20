<?php
/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
*/

namespace System;
use System\ApiSystem;

class ServiceSystem {

    public static function generateAccess($key, $value)
    {
        if (empty($value)) {
            header("HTTP/1.1 401 Unauthorized");
            $dataResponse = [
                'message' => "Akses ditolak. API_KEY diperlukan untuk mengakses sumber daya ini."
            ];
            ApiSystem::jsonResponseGenerate($dataResponse);
            exit;
        }
    }
}