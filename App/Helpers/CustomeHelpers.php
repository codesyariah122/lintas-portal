<?php
namespace App\Helpers;

class CustomeHelpers {

	public static function generateShortUuid() 
	{
		return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 30);
	}

	public static function timestampFormat($timestamp)
	{
		return date('Y-m-d H:i:s', $timestamp);
	}

}