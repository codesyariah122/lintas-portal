<?php
namespace System;

use Core\Commons\UriAccessCore;
use App\Models\{UserModel, RoleModel, LoginModel};


class GateAccessUserSystem extends UriAccessCore {

	protected static function hasAccess($data)
	{	
		$dataUri = $data['uri'];
		$userData = LoginModel::findToken($data['accessToken']);

		$roleName = $data['role_name'];
		$matchedRoute = self::matchRoutePattern($dataUri, $roleName);

		return self::checkAccess($roleName, $matchedRoute, $userData);
	}

	private static function matchRoutePattern($dataUri, $roleName)
	{
		$routePatterns = self::routePattern();
		if (isset($routePatterns[$roleName])) {
			foreach ($routePatterns[$roleName] as $routePattern) {
				$pattern = str_replace('/', '\/', $routePattern);
				if (preg_match("/^$pattern/", $dataUri)) {
					return $routePattern;
				}
			}
		}

		return null;
	}

	private static function checkAccess($roleName, $matchedRoute, $userData)
	{
		if ($matchedRoute === '/api/access/user-data' && $matchedRoute === NULL && in_array($roleName, ['owner', 'authors', 'users'])) {
			return true;
		}

		if (in_array($roleName, $userData) && $matchedRoute !== null) {
			return true;
		}

		return false;
	}
}
