<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return render view
**/

namespace System;

class ViewSystem  {

	public static function renderViewSystem($viewName, $data = []) {
		if(isset($viewName) && !empty($viewName)) {			
			header('Content-Type: text/html; charset=UTF-8');
			extract($data);
			ob_start();
			require_once 'Resources/views/' . $viewName . '.core.php';
		}
	}
}
