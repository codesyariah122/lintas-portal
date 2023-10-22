<?php
namespace App\Models;

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
			$sql = "SELECT l.access_token, u.* FROM " . self::getTableName('logins') . " AS l
			LEFT JOIN " . self::getTableName('users') . " AS u ON l.user_id = u.id
			WHERE l.access_token = :access_token
			ORDER BY l.created_at DESC LIMIT 1";

			$stmt = $db->prepare($sql);
			$stmt->bindParam(':access_token', $accessToken);

			$stmt->execute();

			$result = $stmt->fetch(\PDO::FETCH_ASSOC);

			if ($result !== false) {
				return $result;
			} else {
				echo "Data tidak ditemukan.";
			}

			return ['success' => true, 'message' => "successfully login!", 'data' => $result];
		} catch (PDOException $e) {
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}


	public static function all($name) {
		return parent::all($name);
	}

	public static function findById($id){}

	public static function create($data) {
		$db = self::initDb();
		$db->beginTransaction();

		try {
			$sql = "INSERT INTO " . self::getTableName('logins') . " (user_id, access_token, created_at)
			VALUES (:user_id, :access_token, :created_at)";


			$stmt = $db->prepare($sql);
			$stmt->bindParam(':user_id', $data['user_id']);
			$stmt->bindParam(':access_token', $data['access_token']);
			$stmt->bindParam(':created_at', $data['created_at']);

			if ($stmt->execute()) {
				$sql = "SELECT l.access_token, u.* FROM " . self::getTableName('logins') . " AS l
				LEFT JOIN " . self::getTableName('users') . " AS u ON l.user_id = u.id
				WHERE l.user_id = :user_id
				ORDER BY l.created_at DESC LIMIT 1";

				$result = $db->prepare($sql);
				$result->bindParam(':user_id', $data['user_id']);
				$result->execute();

				$lastInsertedData = $result->fetch(\PDO::FETCH_ASSOC);
				$db->commit();
				return ['success' => true, 'message' => "successfully login!", 'data' => $lastInsertedData];
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