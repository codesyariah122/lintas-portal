<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction} {parent}
**/


namespace Core;

use App\Config\Database;

abstract class ModelCore {
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