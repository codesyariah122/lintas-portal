<?php

namespace App\Middleware;

use System\GateAccessUserSystem as SystemAccess;
use System\ServiceSystem;
use Core\Headers;
use App\Models\LoginModel;

class AuthenticationMiddleware extends SystemAccess {


    public static function handle() 
    {   
        session_start();

        // if(!isset($_SESSION['roles']) && !isset($_SESSION['role_name'])):
        //    throw new \Exception('Not Login Yet / Login session stale', 403);
        // endif;

        $headers = Headers::getallheaders();
        $authorizationHeader = $headers['Authorization'] ?? '';

        if (empty($authorizationHeader) || !str_starts_with($authorizationHeader, 'Bearer ')) {
            throw new \Exception('Autentikasi gagal', 401);
        }

        $accessToken = substr($authorizationHeader, 7);

        $isExpiredLogin = LoginModel::findToken($accessToken);
        if(is_array($isExpiredLogin)){            
            $currentDateTime = new \DateTime();
            $expirationDateTime = new \DateTime($isExpiredLogin['exp_time']);

            if ($currentDateTime > $expirationDateTime) {
                $logout = LoginModel::delete($accessToken);

                if($logout['success']) {
                    // ServiceSystem::destroySession();
                    throw new \Exception("Your login session has expired...", 401);
                } else {
                    throw new \Exception('Please login first !!!', 401);
                }
            }
        }

        if (!self::validateAccessToken($accessToken)) {
            throw new \Exception('Autentikasi gagal', 401);
        }

        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');

        $hasAccess = self::hasAccess(['uri' => $uri, 'accessToken' => $accessToken, 'roles' => $_SESSION['roles'], 'role_name' => $_SESSION['role_name']]);

        if(!$hasAccess) {
            throw new \Exception("Forbaiden if you login as {$_SESSION['role_name']} ...", 401);
        }

    }

    private static function validateAccessToken($accessToken) {
        $userLoginData = LoginModel::findToken($accessToken);
        return $userLoginData;
    }

    public static function setResponse($type, $value)
    {
        if (isset($type)) {
            header("{$type}: {$value}");
        }
    }

}