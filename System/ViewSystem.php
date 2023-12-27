<?php

/**
 * @author : Puji Ermanto <pujiermanto@gmail.com>
 * @return render view
 **/

namespace System;

class ViewSystem
{

	public static function renderViewSystem($viewName, $layout, $data = [])
	{
		if (isset($viewName) && !empty($viewName)) {
			header('Content-Type: text/html; charset=UTF-8');
			$startup = $data['startup'];
			$partials = $data['partials'];
			$contents = $data['contents'];
			extract($data);
			extract($startup);
			extract($contents);
			extract($partials);
			ob_start();
			require_once 'Resources/views/' . $viewName . '.core.php';
			$contents = ob_get_clean();

			// Include layout file
			ob_start();
			require_once 'Resources/views/' . $layout . '.core.php';
			$startup = ob_get_clean();
			echo $startup;
			$partials = ob_get_clean();
			echo $partials;
			echo ob_get_clean();
		}
	}
}
