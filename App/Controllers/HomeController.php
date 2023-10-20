<?php
namespace App\Controllers;

use Core\ControllerCore;

class HomeController extends ControllerCore {
	
	public function index()
	{
		$dataResponse = [
			'message' => 'Hello !!'
		];
		$this->jsonResponse($dataResponse);
	}

	public function all(){}

	public function create(){}

	public function update(){}

	public function delete(){}
}