<?php
namespace App\Models;

use Core\ModelCore;
use App\Resources\ApiResources;
use Core\ServiceContainer;


class UserModel extends ModelCore {
	// protected $serviceContainer;

	// public function __construct(ServiceContainer $serviceContainer) {
	// 	parent::__construct();
	// 	$this->serviceContainer = $serviceContainer;
	// }

	public static function isUserExists($email) {
		$sql = "SELECT COUNT(*) FROM ".self::getTableName('users')." WHERE email = :email";
		$stmt = self::initDb()->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$count = $stmt->fetchColumn();

		return $count > 0;
	}

	public static function getUserByRoles($roleId)
	{
		$sql = "SELECT * FROM " . self::getTableName('users') . " WHERE role_id = :role_id";
		$stmt = self::initDb()->prepare($sql);
		$stmt->bindParam(':role_id', $roleId);
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public static function getUserByEmail($email) {
		$sql = "SELECT * FROM " . self::getTableName('users') . " WHERE email = :email";
		$stmt = self::initDb()->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public static function getHashedPassword($email) {
		$sql = "SELECT password FROM " . self::getTableName('users') . " WHERE email = :email";
		$stmt = self::initDb()->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$result = $stmt->fetch(\PDO::FETCH_ASSOC);

		return ($result !== false) ? $result['password'] : null;
	}


	public static function all($name) {
		return parent::all($name);
	}

	public static function findById($id){}
	
	public static function create($data) {
		$db = self::initDb();
		$db->beginTransaction();

		try {

			$sql = "INSERT INTO " . self::getTableName('users') . " (uuid, email, password, name, role_id, coordinates, displayLocation, articles_id, created_at)
			VALUES (:uuid, :email, :password, :name, :role_id, :coordinates, :displayLocation, :articles_id, :created_at)";

			// var_dump($data['location']); die;

			$stmt = $db->prepare($sql);
			$stmt->bindParam(':uuid', $data['uuid']);
			$stmt->bindParam(':email', $data['email']);
			$stmt->bindParam(':password', $data['password']);
			$stmt->bindParam(':name', $data['name']);
			$stmt->bindParam(':role_id', $data['role_id']);
			// $stmt->bindParam(':location', $data['location'], \PDO::PARAM_STR);
			$stmt->bindParam(':coordinates', $data['coordinates'], \PDO::PARAM_STR);
			$stmt->bindParam(':displayLocation', $data['displayLocation']);
			$stmt->bindParam(':articles_id', $data['articles_id']);
			$stmt->bindParam(':created_at', $data['created_at']);

			if ($stmt->execute()) {
				$sql = "SELECT users.*, roles.name AS role_name
				FROM users
				INNER JOIN roles ON users.role_id = roles.id
				ORDER BY users.created_at DESC
				LIMIT 1;";

				$result = $db->query($sql);

				$lastInsertedData = $result->fetchAll(\PDO::FETCH_ASSOC);
				$db->commit();
				return ['success' => true, 'message' => "New user with name : {$lastInsertedData[0]['name']}, successfully created!", 'data' => $lastInsertedData];
			} else {
				$db->rollBack();
				return ['success' => false, 'message' => "SQL Error: " . $stmt->errorInfo()[2]];
			}
		} catch (\PDOException $e) {
			$db->rollBack();
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}
	
	public static function update($id, $data){}
	
	public static function delete($id){}

}