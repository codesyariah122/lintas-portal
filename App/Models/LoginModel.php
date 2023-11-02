<?php
namespace App\Models;

use System\ServiceSystem;
use Core\ModelCore;
use App\Resources\ApiResources;
use Core\ServiceContainer;

class LoginModel extends ModelCore {
	// protected $serviceContainer;

	// public function __construct(ServiceContainer $serviceContainer) {
	// 	parent::__construct();
	// 	$this->serviceContainer = $serviceContainer;
	// }

	public static function isUserLoggedIn($userId)
	{
		$sql = "SELECT COUNT(*) FROM " . self::getTableName('logins') . " WHERE user_id = :user_id";
		$stmt = self::initDb()->prepare($sql);
		$stmt->bindParam(':user_id', $userId);
		$stmt->execute();

		$count = $stmt->fetchColumn();

		return $count > 0;
	}

	public static function findToken($accessToken)
	{
		$db = self::initDb();

		try {
			$sql = "SELECT l.access_token, l.exp_time, u.id, u.email, u.name, u.role_id, r.name AS role_name
			FROM " . self::getTableName('logins') . " AS l
			LEFT JOIN " . self::getTableName('users') . " AS u ON l.user_id = u.id
			LEFT JOIN " . self::getTableName('roles') . " AS r ON u.role_id = r.id
			WHERE l.access_token = :access_token
			ORDER BY l.created_at DESC LIMIT 1";


			$stmt = $db->prepare($sql);
			$stmt->bindParam(':access_token', $accessToken);

			$stmt->execute();

			$result = $stmt->fetch(\PDO::FETCH_ASSOC);

			if ($result !== false) {
				return $result;
			} else {
				return false;
			}

			return ['success' => true, 'message' => "User data login!", 'data' => $result];
		} catch (PDOException $e) {
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}


	public static function all($name) {
		return parent::all($name);
	}

	public static function findById($id){
		$db = self::initDb();

		try {
			
			$stmt = $db->prepare("SELECT * FROM ".self::getTableName('logins') ." WHERE user_id = :user_id");
			$stmt->bindParam(':user_id', $id, \PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(\PDO::FETCH_ASSOC);

			return ['success' => true, 'message' => "User data login!", 'data' => $result];
		} catch (PDOException $e) {
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}

	public static function create($data) {
		$db = self::initDb();
		$db->beginTransaction();

		try {
			$sql = "INSERT INTO " . self::getTableName('logins') . " (user_id, access_token, exp_time, created_at)
			VALUES (:user_id, :access_token, :exp_time, :created_at)";


			$stmt = $db->prepare($sql);
			$stmt->bindParam(':user_id', $data['user_id']);
			$stmt->bindParam(':access_token', $data['access_token']);
			$stmt->bindParam(':exp_time', $data['exp_time']);
			$stmt->bindParam(':created_at', $data['created_at']);

			if ($stmt->execute()) {
				$sql = "SELECT l.access_token, u.id, u.email, u.name, u.role_id, r.name AS role_name
				FROM " . self::getTableName('logins') . " AS l
				LEFT JOIN " . self::getTableName('users') . " AS u ON l.user_id = u.id
				LEFT JOIN " . self::getTableName('roles') . " AS r ON u.role_id = r.id
				WHERE l.user_id = :user_id
				ORDER BY l.created_at DESC LIMIT 1";

				$result = $db->prepare($sql);
				$result->bindParam(':user_id', $data['user_id']);
				$result->execute();

				$lastInsertedData = $result->fetch(\PDO::FETCH_ASSOC);
				$lastInsertedData['exp_time'] = $data['exp_time'];
				$db->commit();

				// Set session user
				$dataSession = [
					[
						'key' => 'expTime',
						'value' => $data['exp_time']
					],
					[
						'key' => 'accessToken',
						'value' => $lastInsertedData['access_token']
					],
					[
						'key' => 'roles',
						'value' => $lastInsertedData['role_id']
					],
					[
						'key' => 'role_name',
						'value' => $lastInsertedData['role_name']
					]
				];
				ServiceSystem::generateSession($dataSession);
				
				return [
					'success' => true, 
					'message' => "successfully login!", 
					'data' => $lastInsertedData
				];
			} else {
				$db->rollBack();
				return [
					'success' => false,
					'message' => "SQL Error: " . $stmt->errorInfo()[2]
				];
			}
		} catch (\PDOException $e) {
			$db->rollBack();
			return [
				'success' => false,
				'message' => $e->getMessage()
			];
		}
	}

	public static function update($id, $data){}

	public static function delete($accessToken) {
		$db = self::initDb();
		$db->beginTransaction();

		try {
			$selectSql = "SELECT l.access_token, u.* FROM " . self::getTableName('logins') . " AS l
			LEFT JOIN " . self::getTableName('users') . " AS u ON l.user_id = u.id
			WHERE l.access_token = :access_token
			ORDER BY l.created_at DESC LIMIT 1";

			$selectStmt = $db->prepare($selectSql);
			$selectStmt->bindParam(':access_token', $accessToken);
			$selectStmt->execute();

			$deletedData = $selectStmt->fetch(\PDO::FETCH_ASSOC);

			$deleteSql = "DELETE FROM " . self::getTableName('logins') . " WHERE access_token = :access_token";
			$deleteStmt = $db->prepare($deleteSql);
			$deleteStmt->bindParam(':access_token', $accessToken);

			if ($deleteStmt->execute()) {
				$db->commit();
				return ['success' => true, 'message' => "successfully logout!", 'data' => $deletedData];
			} else {
				$db->rollBack();
				return ['success' => false, 'message' => "SQL Error: " . $deleteStmt->errorInfo()[2]];
			}
		} catch (\PDOException $e) {
			$db->rollBack();
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}

}