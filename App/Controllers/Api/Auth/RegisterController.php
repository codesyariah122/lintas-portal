<?php
namespace App\Controllers\Api\Auth;

use Core\Controller;

class RegisterController extends Controller {
	public function index(){}

	public function all(){}

	public function create()
	{
		$data = @$_POST;
		var_dump($data); die;
	}

	public function update(){}

	public function delete(){}
}