<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return className
* @desc : File ini menjalankan built in function yang ada dalam package bahasa pemrogramman PHP khusus di versi 5 keatas
**/
namespace App\Config;

use App\Config\Environment;

class Autoload {

	public static function go()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		date_default_timezone_set('Asia/Jakarta');
		spl_autoload_register(function($className) {
			$classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);

			$classFile = $classPath . '.php';

			if(file_exists($classFile))
				require_once $classFile;
		});
		
		Environment::env();

		require_once __DIR__ .'/../../Core/Adapter.php';
	}
}
