<?php
namespace Core\Commons;

class UriAccessCore {
	public static function routePattern()
	{
		return [
			'owner' => [
				'/api/access/add-role',
				'/api/access/add-owner',
				'/api/access/roles',
				'/api/access/user-data',
				'/api/access/logout'
			],
			'authors' => [
				'/api/access/add-article',
				'/api/access/user-data',
				'/api/access/logout'
			],
			'users'=> [
				'/api/access/user-data',
				'/api/access/logout'
			]
		];
	}

	public static function rules()
	{
		return [
			'prefix' => [
				['uri' => '/api/access']
			],
			'suffix' => [
				['uri' => '/roles'],
				['uri' => '/add-role'],
				['uri' => '/add-owner']
			]
		];
	}
}