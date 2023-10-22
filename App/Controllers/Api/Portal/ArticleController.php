<?php
namespace App\Controllers\Api\Portal;

use Core\ControllerCore;
use App\Models\ArticleModel;

class ArticleController extends ControllerCore {
	public function index(){}

	public function all(){}


	public function create()
	{
		$data = @$_POST;

		var_dump($data);
		
	}



	public function update(){}

	public function delete(){}
}