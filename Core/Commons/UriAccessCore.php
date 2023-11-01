<?php
namespace Core\Commons;

class UriAccessCore {
	public static function routePattern()
	{
		$routes = ConstantsCommons::$routes;
		foreach (array_keys($routes) as $role) {
			$routes[$role] = array_merge($routes[$role], [
				'/api/access/user-data',
				'/api/access/logout'
			]);
		}

		return $routes;
	}

	public static function rules()
	{
		return ConstantsCommons::$rules;
	}
}