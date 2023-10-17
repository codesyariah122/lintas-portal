<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return : environment.file
* @desc : File ini difungsikan untuk konfigurasi environment constanta dalam hal ini adalah guna di peruntukan bagi setup database awal.
**/

namespace App\Config;

class Environment {

	public static function config()
    {
        $dotenv = parse_ini_file('.env');

        if (!defined('HOST')) {
            define('HOST', $dotenv['HOST_DB']);
        }

        if (!defined('USER')) {
            define('USER', $dotenv['USER_DB']);
        }

        if (!defined('PASSWORD')) {
            define('PASSWORD', $dotenv['USER_PW']);
        }

        if (!defined('DB')) {
            define('DB', $dotenv['DB']);
        }

        if (!defined('IP_API_URL')) {
            define('IP_API_URL', $dotenv['IP_API_URL']);
        }

        if (!defined('GEO_API_URL')) {
            define('GEO_API_URL', $dotenv['GEO_API_URL']);
        }

        if (!defined('GEODATA_API_URL')) {
            define('GEODATA_API_URL', $dotenv['GEODATA_API_URL']);
        }

        if (!defined('GEODATA_API_KEY')) {
            define('GEODATA_API_KEY', $dotenv['GEODATA_API_KEY']);
        }

        if(!defined('GEODATA_SEARCH_API_URL')) {
            define('GEODATA_SEARCH_API_URL', $dotenv['GEODATA_SEARCH_API_URL']);
        }
    }
}