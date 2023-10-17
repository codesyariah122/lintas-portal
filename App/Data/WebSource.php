<?php
namespace App\Data;

class WebSource {
	public static function renderContents($page){
		switch($page):
			case 'atm':
			$title = "Atm Machine";
			$navbar = 'App/Views/Partials/navbar.php';
			$sidebar = '';
			$contents = [
				'loadingOverlay' => 'App/Views/Partials/loading-overlay.php',
				'content' => 'App/Views/Atm/page-content.php'
			];
			$links = [];
			$scripts = [
				'/public/assets/js/script.js',
				'/public/assets/js/functions.js',
				'/public/assets/js/app.js'
			];
			break;
		endswitch;

		return [
			'logo' => '/public/assets/img/icon.png',
			'favicon' => '/public/assets/img/favicon.ico',
			'title' => $title,
			'tagline' => 'ATM::MACHINE',
			'brand' => 'Atm Machine',
			'contents' => $contents,
			'scripts' => $scripts,
			'links' => $links,
			'vendor' => [
				'tailwind' => '/public/assets/vendor/js/tailwind.js',
				'fontawesome' => '/public/assets/vendor/css/all.min.css',
				'flowbite' => [
					'css' => '/public/assets/vendor/css/flowbite.min.css',
					'js' => '/public/assets/vendor/js/flowbite.min.js',
				],
				'contentful' => '/public/assets/vendor/js/contentful.browser.min.js',
				'sweetalert' => '/public/assets/vendor/js/sweetalert2@11.js'
			],
		];
	}
}