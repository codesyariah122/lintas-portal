<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction} {parent}
**/


namespace Core;

use App\Config\Database;

abstract class ModelCore implements ModelInterface {
	protected static $db;

    public function __construct() {
        $this->db = Database::connection();
    }

    public static function init() {
        if (is_null(self::$db)) {
            self::$db = Database::connection();
        }
    }

    protected static function initDb() {
        return Database::connection();
    }
    
    public static function all($table) {
        self::init();
        $tableName = self::getTableName($table);
        $query = 'SELECT * FROM ' . $tableName .' ORDER by id DESC';
        $stmt = self::$db->query($query);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public static function paginate($table, $page, $perPage) {
        self::init();
        $tableName = self::getTableName($table);
        $offset = ($page - 1) * $perPage;
        $query = 'SELECT * FROM ' . $tableName . ' ORDER BY id DESC LIMIT ' . $perPage . ' OFFSET ' . $offset;
        $stmt = self::$db->query($query);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public static function countAllItems($table) {
        self::init();
        $tableName = self::getTableName($table);
        $query = 'SELECT COUNT(*) as count FROM ' . $tableName;
        $stmt = self::$db->query($query);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return $result['count'];
        } else {
            return 0;
        }
    }

    public static function search($title, $page, $perPage, $table) {
        self::init();
        $tableName = self::getTableName($table);
        $offset = ($page - 1) * $perPage;
        $titleParam = '%' . $title . '%';
        $query = 'SELECT * FROM ' . $tableName . ' WHERE title LIKE :title ORDER BY id DESC LIMIT ' . $perPage . ' OFFSET ' . $offset;
        $stmt = self::$db->prepare($query);
        $stmt->bindParam(':title', $titleParam, \PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public static function countSearchResults($title, $table) {
        self::init();
        $tableName = self::getTableName($table);
        $query = 'SELECT COUNT(*) as count FROM ' . $tableName . ' WHERE title LIKE :title';
        $stmt = self::$db->prepare($query);
        $stmt->bindValue(':title', $title, \PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return $result['count'];
        } else {
            return 0;
        }
    }


    // Abstract method untuk mendapatkan nama tabel (setiap model akan mengimplementasikannya sendiri)
    protected static function getTableName($table) {
        return $table;
    }

    protected function getConnection() {
        return $this->db;
    }

    abstract public static function findById($id);
    abstract public static function create($data);
    abstract public static function update($id, $data);
    abstract public static function delete($id);
}