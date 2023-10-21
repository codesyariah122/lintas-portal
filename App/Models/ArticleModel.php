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

	public static function findById($id){}
	
	public static function create($data) {
		
	}
	
	public static function update($id, $data){}
	
	public static function delete($id){}

}