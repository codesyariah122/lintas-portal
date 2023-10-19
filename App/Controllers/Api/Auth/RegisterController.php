<?php
namespace App\Controllers\Api\Auth;

use Brick\Geo\LineString;
use Brick\Geo\Point;
use Brick\Geo\Polygon;
use Core\ControllerCore;
use Core\Headers;
use Core\RequestApi;
use App\Resources\ApiResources;
use App\Models\{UserModel, AuthorModel, RoleModel};
use App\Helpers\CustomeHelpers;

class RegisterController extends ControllerCore {
	public function index(){}

	public function all(){}


	public function create()
	{
		$data = @$_POST;
		$rules = [
			'email' => ['email' => true],
			'name' => ['minLength' => 3],
			'password' => ['minLength' => 8, 'passwordStrength' => true],
			'confirm_password' => [],
			'author' => []
		];

		$errors = $this->validateInput($data, $rules);

		if (!empty($errors)) {
			$response = ApiResources::createErrorResponse('Validation failed', ['errors' => $errors]);
			$this->jsonResponse($response);
			return;
		}

		$author = $data['author'];
		$email = $data['email'];
		$existsDataModel = $author ? AuthorModel::isUserExists($email) : UserModel::isUserExists($email);

		if ($existsDataModel) {
			$response = ApiResources::createErrorResponse('Email already exists.');
			$this->jsonResponse($response);
		} else {
			$api_key = GEODATA_API_KEY;
			$keyword = $data['address'];
			$api_url = GEODATA_SEARCH_API_URL.'?search='.$keyword .'&api_key='.$api_key;
			$response = file_get_contents($api_url);
			$responseData = json_decode($response);
			$locations = [
				'displayName' => $responseData->data->results[0]->displayName,
				'lng' => $responseData->data->results[0]->lng,
				'lat' => $responseData->data->results[0]->lat,
				'coordinate' => $responseData->data->results[0]->coordinate
			];
			$longitude = $responseData->data->results[0]->lng;
			$latitude = $responseData->data->results[0]->lat;

        	// Membuat objek Point dengan longitude dan latitude
			$point = Point::xy($longitude, $latitude);

        	// Mengubah objek Point ke format biner yang sesuai untuk kolom geometri
			$location = $point->asBinary();

			$generateUuid = CustomeHelpers::generateShortUuid();
			$roleData = RoleModel::findById($data['author'] ? 1 : 2);
			$author = filter_var($data['author'], FILTER_VALIDATE_BOOLEAN);
			$newUserData = [
				'uuid' => $generateUuid,
				'email' => $data['email'],
				'password' => password_hash($data['password'], PASSWORD_DEFAULT),
				'name' => $data['name'],
				'role_id' => $roleData->id,
            // 'location' => $location,
				'coordinates' => $locations['coordinate'],
			// 'coordinates' => "POINT({$point->x()} {$point->y()})",
				'displayLocation' => $locations['displayName'],
				'articles_id' => NULL,
				'created_at' => date('Y-m-d H:i:s')
			];

			if ($author) {
				$newUserData['bio'] = $data['bio'];
			}

			$userData = $author ? AuthorModel::create($newUserData) : UserModel::create($newUserData);

			$response = ApiResources::fromResponseToResult($userData);

			$this->jsonResponse($response);
		}
	}



	public function update(){}

	public function delete(){}
}