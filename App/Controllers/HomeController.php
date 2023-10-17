<?php
namespace App\Controllers;

use Core\Controller;
use App\Resources\ApiResources;

class HomeController extends Controller {
	public function index()
	{
		$dataResponse = [
			'message' => 'Hallo Portal !!'
		];
		$this->jsonResponse($dataResponse);
	}

	public function all(){}

	public function create(){}

	public function update(){}

	public function delete(){}
}