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

	public static function all($name) {
		return parent::all($name);
	}

	public static function findById($id){}
	
	public static function create($data) {
		$db = self::initDb();
		$db->beginTransaction();

		try {
			$sql = "INSERT INTO " . self::getTableName('logins') . " (user_id, author_id, access_token, created_at)
			VALUES (:user_id, :author_id, :access_token, :created_at)";


			$stmt = $db->prepare($sql);
			$stmt->bindParam(':user_id', $data['user_id']);
			$stmt->bindParam(':author_id', $data['author_id']);
			$stmt->bindParam(':access_token', $data['access_token']);
			$stmt->bindParam(':created_at', $data['created_at']);

			if ($stmt->execute()) {
				$sql = "SELECT access_token FROM " . self::getTableName('logins') . " ORDER BY created_at DESC LIMIT 1";
				$result = $db->query($sql);

				$lastInsertedData = $result->fetchAll(\PDO::FETCH_ASSOC);
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