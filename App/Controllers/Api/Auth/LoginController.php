<?php
namespace App\Controllers\Api\Auth;

use Firebase\JWT\JWT;
use Core\ControllerCore;
use Core\Headers;
use Core\RequestApi;
use App\Resources\ApiResources;
use App\Models\{UserModel, AuthorModel, RoleModel, LoginModel};
use App\Helpers\CustomeHelpers;

class LoginController extends ControllerCore {
	public function index(){}

	public function all(){}


	public function create()
	{
		$data = @$_POST;
		$email = $data['email'];
		$password = $data['password'];

		$privateKeyPath = PRIVATE_KEY_PATH;
		$privateKey = file_get_contents($privateKeyPath);

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

		if (UserModel::isUserExists($email)) {
			$hashedPassword = UserModel::getHashedPassword($email);

			if (password_verify($password, $hashedPassword)) {
            	// Kata sandi benar, lanjutkan untuk membuat token akses JWT
				$user = UserModel::getUserByEmail($email);

            	// Cek apakah pengguna sudah memiliki token akses aktif
				$userIsLoggedIn = LoginModel::isUserLoggedIn($user['id']);

				if (!$userIsLoggedIn) {
					$data = [
						'user_id' => $user['id'],
						'exp' => strtotime('+1 hour'),
					];

					$token = JWT::encode($data, $privateKey, 'RS256');

					$loginData = [
						'user_id' => $user['id'],
						'author_id' => null,
						'access_token' => $token,
						'created_at' => date('Y-m-d H:i:s'),
					];

					$insertResult = LoginModel::create($loginData);
					$response = ApiResources::fromResponseToResult($insertResult);
					$this->jsonResponse($response);
				} else {
                // Jika iya, Anda dapat mengirim respons sesuai dengan kebijakan Anda.
					$response = ApiResources::createErrorResponse('Login failed', ['message' => 'User is already logged in']);
					$this->jsonResponse($response);
					return;
				}
			} else {
            // Kata sandi salah, kirim respons kesalahan
				$response = ApiResources::createErrorResponse('Login failed', ['message' => 'Invalid password']);
				$this->jsonResponse($response);
				return;
			}
		} else {
        // Email tidak ditemukan, kirim respons kesalahan
			$response = ApiResources::createErrorResponse('Login failed', ['message' => 'Email not found']);
			$this->jsonResponse($response);
			return;
		}
	}



	public function update(){}

	public function delete(){}
}