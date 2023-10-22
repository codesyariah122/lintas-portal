<?php
namespace App\Controllers\Api\Users;

use Brick\Geo\LineString;
use Brick\Geo\Point;
use Brick\Geo\Polygon;
use Core\ControllerCore;
use Core\Headers;
use Core\RequestApi;
use App\Resources\ApiResources;
use App\Models\{UserModel, RoleModel, LoginModel};
use App\Helpers\CustomeHelpers;

class UserDataController extends ControllerCore {

	public function index(){
		$accessToken = $_SESSION['accessToken'];
		$userLogoutData = LoginModel::findToken($accessToken);
		if(!$userLogoutData) {
			$response = ApiResources::createErrorResponse('Data Failed!!', ['message' => 'Failed user data / Token Not Found!!!']);
			$this->jsonResponse($response);
		} else {
			$response = ApiResources::fromResponseToResult($userLogoutData);
			$this->jsonResponse($response);
		}
	}

	public function all(){}


	public function create(){}

	public function update(){}

	public function delete(){}
}