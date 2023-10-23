<?php
namespace System;

class UriAccessSystem {

	public static function routePattern()
	{
		return [
			'/api/access/add-role',
			'/api/access/add-owner',
			'/api/access/roles'
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