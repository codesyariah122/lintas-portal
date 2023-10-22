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
		$userLoginData = LoginModel::findToken($accessToken);
		if($userLoginData) {
			$response = ApiResources::fromResponseToResult($userLoginData);
			$this->jsonResponse($response);
		}
	}

	public function all(){}


	public function create(){}

	public function update(){}

	public function delete(){}
}