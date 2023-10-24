<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return : __constructor
* @desc : File ini difungsikan untuk konfigurasi awal database untuk aplikasi ini
**/

namespace App\Config;

class Database {

	private static $conn = null;

	public static function connection() {
		
		if (self::$conn === null) {
			$servername = HOST_DB;
			$username = USER_DB;
			$password = DB_PW;
			$dbname = DB;

			try {
				self::$conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch (\PDOException $e) {
				throw new \PDOException('Autentikasi gagal'.$e->getMessage(), 401);
			}
		}

		return self::$conn;
	}
}

