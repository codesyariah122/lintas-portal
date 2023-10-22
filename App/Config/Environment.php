<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return : environment.file
* @desc : File ini difungsikan untuk konfigurasi environment constanta .
**/

namespace App\Config;

class Environment {

    private static $environmentVariables = [
        'BASE_URL',
        'PRIVATE_KEY_PATH',
        'API_KEY',
        'SECRET_KEY',
        'HOST_DB',
        'USER_DB',
        'DB_PW',
        'DB',
        'IP_API_URL',
        'GEO_API_URL',
        'GEODATA_API_URL',
        'GEODATA_API_KEY',
        'GEODATA_SEARCH_API_URL'
    ];

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