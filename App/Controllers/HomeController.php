<?php
namespace App\Controllers;

use Core\ControllerCore;

class HomeController extends ControllerCore {
	
	public function index()
	{
		$dataResponse = [
			'message' => 'Lintas Portal Website !!'
		];
		// $this->jsonResponse($dataResponse);
		$this->render('home', $dataResponse);
	}

	public function all(){}

	public function create(){}

	public function update(){}

	public function delete(){}
}