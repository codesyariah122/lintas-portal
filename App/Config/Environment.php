<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return : environment.file
* @desc : File ini difungsikan untuk konfigurasi environment constanta .
**/

namespace App\Config;

use Core\Commons\ConstantsCommons as EnvListCore;

class Environment extends EnvListCore{

    public static function env()
    {
        $dotenv = parse_ini_file('.env');
        foreach (self::$environmentVariables as $variableName) {
            if (array_key_exists($variableName, $dotenv) && !defined($variableName)) {
                define($variableName, $dotenv[$variableName]);
            }
        }
    }
}