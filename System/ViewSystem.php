<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return render view
**/

namespace System;

class ViewSystem  {

	public static function renderViewSystem($viewName, $data = []) {
		extract($data);
		ob_start();
		require_once 'Resources/views/' . $viewName . '.core.php';
	}
}
