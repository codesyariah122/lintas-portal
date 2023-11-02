<?php
namespace App\Controllers\Api\Users;

use Brick\Geo\LineString;
use Brick\Geo\Point;
use Brick\Geo\Polygon;
use Core\ControllerCore;
use Core\Headers;
use Core\RequestApi;
use App\Resources\ApiResources;
use App\Models\{UserModel, RoleModel};
use App\Helpers\CustomeHelpers;

class UserOwnerController extends ControllerCore {
	public function index(){}

	public function all(){}


	public function create()
	{
		$data = $this->cleanInput(@$_REQUEST);
		$rules = [
			'email' => ['required' => true, 'email' => true],
			'name' => ['required' => true, 'minLength' => 3],
			'password' => ['required' => true, 'minLength' => 8, 'passwordStrength' => true],
			'confirm_password' => ['required' => true]
		];


		$errors = $this->validateInput($data, $rules);

		if (!empty($errors)) {
			$response = ApiResources::createErrorResponse('Validation failed', ['errors' => $errors]);
			$this->jsonResponse($response);
			return;
		}

		$existsDataModel = UserModel::isUserExists($data['email']);

		if ($existsDataModel) {
			$response = ApiResources::createErrorResponse('Email already exists.');
			$this->jsonResponse($response);
		} else {
			$api_key = GEODATA_API_KEY;
			$keyword = $data['address'];
			$api_url = GEODATA_SEARCH_API_URL.'?search='.$keyword .'&api_key='.$api_key;
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');
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
			$roleData = RoleModel::findById(isset($data['role_id']) ? $data['role_id'] : 1);

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


			$userData = UserModel::create($newUserData);

			$response = ApiResources::fromResponseToResult($userData);

			$this->jsonResponse($response);
		}
	}



	public function update(){}

	public function delete(){}
}