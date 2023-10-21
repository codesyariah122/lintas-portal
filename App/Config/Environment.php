<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return : environment.file
* @desc : File ini difungsikan untuk konfigurasi environment constanta .
**/

namespace App\Config;

class Environment {

	public static function env()
    {
        $dotenv = parse_ini_file('.env');

        if (array_key_exists('API_KEY', $dotenv) && !defined('API_KEY')) {
            define('API_KEY', $dotenv['API_KEY']);
        }

        if (array_key_exists('HOST_DB', $dotenv) && !defined('HOST')) {
            define('HOST', $dotenv['HOST_DB']);
        }

        if (array_key_exists('USER_DB', $dotenv) && !defined('USER')) {
            define('USER', $dotenv['USER_DB']);
        }

        if (array_key_exists('USER_PW', $dotenv) && !defined('PASSWORD')) {
            define('PASSWORD', $dotenv['USER_PW']);
        }

        if (array_key_exists('DB', $dotenv) && !defined('DB')) {
            define('DB', $dotenv['DB']);
        }

        if (array_key_exists('IP_API_URL', $dotenv) && !defined('IP_API_URL')) {
            define('IP_API_URL', $dotenv['IP_API_URL']);
        }

        if (array_key_exists('GEO_API_URL', $dotenv) && !defined('GEO_API_URL')) {
            define('GEO_API_URL', $dotenv['GEO_API_URL']);
        }

        if (array_key_exists('GEODATA_API_URL', $dotenv) && !defined('GEODATA_API_URL')) {
            define('GEODATA_API_URL', $dotenv['GEODATA_API_URL']);
        }

        if (array_key_exists('GEODATA_API_KEY', $dotenv) && !defined('GEODATA_API_KEY')) {
            define('GEODATA_API_KEY', $dotenv['GEODATA_API_KEY']);
        }

        if (array_key_exists('GEODATA_SEARCH_API_URL', $dotenv) && !defined('GEODATA_SEARCH_API_URL')) {
            define('GEODATA_SEARCH_API_URL', $dotenv['GEODATA_SEARCH_API_URL']);
        }
    }
}