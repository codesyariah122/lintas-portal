<?php

namespace App\Controllers;

use Core\ControllerCore;
use App\Models\{WebModel};

class HomeController extends ControllerCore
{

	public function index()
	{
		$env = ENV_DEV;
		$layout = 'Layouts/DefaultLayout';
		$view = 'home';
		$dataResponse = [
			"title" => ucfirst("inisiatifkebaikan.org - #WadahInisiatifKebaikan"),
			'message' => 'Lintas Portal Website !!',
			'env' => $env,
			'carousels' => WebModel::carousels()['data'],
			'articles' => WebModel::articles()['data'],
			'startup' => ['Partials/Popup'],
			'partials' => ['Partials/Navbar', 'Partials/Carousel', 'Partials/NavigationBottom'],
			'contents' => ['Home/Articles']
		];

		// $this->jsonResponse($dataResponse);
		$this->render($view, $layout, $dataResponse);
	}

	public function all()
	{
	}

	public function create()
	{
	}

	public function update()
	{
	}

	public function delete()
	{
	}
}
