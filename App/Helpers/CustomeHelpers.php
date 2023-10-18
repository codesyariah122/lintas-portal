<?php
namespace App\Helpers;

class CustomeHelpers {

	public static function generateShortUuid() 
	{
		return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 30);
	}

}