<?php
namespace System;

use Core\Commons\RouteListCore;

class RouteSystem extends RouteListCore {

	public static function generateRoute()
	{
		$listRoutes = self::listRoutes();

		foreach($listRoutes as $route) {
			require_once __DIR__ . "/../". $route;
		}
	}
}