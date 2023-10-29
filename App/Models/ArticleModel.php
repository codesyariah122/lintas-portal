<?php
namespace App\Models;

use Core\ModelCore;
use App\Resources\ApiResources;
use Core\ServiceContainer;


class ArticleModel extends ModelCore {
	// protected $serviceContainer;

	// public function __construct(ServiceContainer $serviceContainer) {
	// 	parent::__construct();
	// 	$this->serviceContainer = $serviceContainer;
	// }

	public static function all($name) {
		return parent::all($name);
	}

	public static function findById($id)
	{
		$db = self::initDb();

		$sql = "SELECT * FROM " . self::getTableName('articles') . " WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
		$stmt->execute();

		$article = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($article) {
			return ['success' => true, 'data' => $article];
		} else {
			return ['success' => false, 'message' => 'Artikel tidak ditemukan'];
		}
	}
	
	public static function create($data)
	{
		$db = self::initDb();
		$db->beginTransaction();

		try {
			$sql = "INSERT INTO " . self::getTableName('articles') . " (title, cover, cover_caption, content, published_at, user_id, location)
			VALUES (:title, :cover, :cover_caption, :content, :published_at, :user_id, :location)";

			$stmt = $db->prepare($sql);

			$stmt->bindParam(':title', $data['title']);
			$stmt->bindParam(':cover', $data['cover']);
			$stmt->bindParam(':cover_caption', $data['cover_caption']);
			$stmt->bindParam(':content', $data['content']);
			$stmt->bindParam(':published_at', $data['published_at']);
			$stmt->bindParam(':user_id', $data['user_id']);
			$stmt->bindParam(':location', $data['location']);

			if ($stmt->execute()) {
				$lastInsertId = $db->lastInsertId();
				$db->commit();
				return ['success' => true, 'message' => 'Artikel berhasil disimpan', 'last_insert_id' => $lastInsertId];
			} else {
				$db->rollBack();
				return ['success' => false, 'message' => 'Gagal menyimpan artikel'];
			}
		} catch (PDOException $e) {
			$db->rollBack();
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}

	
	public static function update($id, $data){}
	
	public static function delete($id){}

}