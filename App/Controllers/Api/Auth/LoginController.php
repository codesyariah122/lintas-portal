<?php
namespace App\Controllers\Api\Auth;

use Core\ControllerCore;

class LoginController extends ControllerCore {
	public function index(){}

	public function all(){}


	public function create()
	{
		$data = @$_POST;
		$rules = [
			'email' => ['required' => true, 'email' => true],
			'password' => ['required' => true, 'minLength' => 8, 'passwordStrength' => true]
		];

		$errors = $this->validateInput($data, $rules);

		if (!empty($errors)) {
			$response = ApiResources::createErrorResponse('Validation failed', ['errors' => $errors]);
			$this->jsonResponse($response);
			return;
		}

		
	}



	public function update(){}

	public function delete(){}
}