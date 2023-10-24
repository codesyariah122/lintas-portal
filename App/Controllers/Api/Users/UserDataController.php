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
		$expTime = $_SESSION['expTime'];		
		$userLoginData = LoginModel::findToken($accessToken);
		$userLoginData['exp_time'] = CustomeHelpers::timestampFormat($expTime);
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