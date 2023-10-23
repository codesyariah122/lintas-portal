<?php
namespace System;

use System\UriAccessSystem;
use App\Models\{UserModel, RoleModel, LoginModel};


class GateAccessUserSystem extends UriAccessSystem {

	protected static function hasAccess($data)
	{	
		$dataUri = $data['uri'];
		$routePatterns = self::routePattern();
		$routeRules = self::rules();

		$matchedRoute = null;
		foreach ($routePatterns as $routePattern) {
			$pattern = str_replace('/', '\/', $routePattern);
			if (preg_match("/^$pattern/", $dataUri)) {
				$matchedRoute = $routePattern;
				break;
			}
		}

		$userData = LoginModel::findToken($data['accessToken']);

		if($matchedRoute !== NULL) {
			if(in_array('owner', $userData) && $userData['role_id'] === 1) {
				return true;
			}

			return false;
		}

		return true;

	}
}