<?php
namespace App\Models;

use Core\ModelCore;
use App\Resources\ApiResources;
use Core\ServiceContainer;


class RoleModel extends ModelCore {
	// protected $serviceContainer;

	// public function __construct(ServiceContainer $serviceContainer) {
	// 	parent::__construct();
	// 	$this->serviceContainer = $serviceContainer;
	// }

	public static function isRoleExists($name) {
		$sql = "SELECT COUNT(*) FROM ".self::getTableName('roles')." WHERE name = :name";
		$stmt = self::initDb()->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->execute();

		$count = $stmt->fetchColumn();

		return $count > 0;
	}

	public static function all($name) {
		return parent::all($name);
	}

	public static function findById($id) {
		try {
			$sql = "SELECT * FROM " . self::getTableName('roles') . " WHERE id = :id";
			$stmt = self::initDb()->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$result = $stmt->fetch(\PDO::FETCH_OBJ);

			if ($result) {
				return $result;
			} else {
				return null;
			}
		} catch (\PDOException $e) {
			return $e->getMessage();
		}
	}


	public static function create($data) {
		try {
			$sql = "INSERT INTO ".self::getTableName('roles')." (name) VALUES (:name)";
			$stmt = self::initDb()->prepare($sql);
			$stmt->bindParam(':name', $data['name']);

			$stmt->execute();

			return self::initDb()->lastInsertId();
		} catch (\PDOException $e) {
			return $e->getMessage();
		}
	}

	public static function update($id, $data){}

	public static function delete($id){}

}