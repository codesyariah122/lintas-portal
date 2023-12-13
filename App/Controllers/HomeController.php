<?php

namespace App\Controllers;

use Core\ControllerCore;

class HomeController extends ControllerCore
{

	public function index()
	{
		$env = ENV_DEV;
		$layout = 'Layouts/DefaultLayout';
		$view = 'home';
		$dataResponse = [
			"title" => ucfirst("inisiatif kebaikan"),
			'message' => 'Lintas Portal Website !!',
			'env' => $env,
			'carousels' => [
				[
					'id' => 1,
					'img_url' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/11/Thumbnail-Abah-Dakir-1.jpg',
					'title' => 'Abah Dakir'
				],
				[
					'id' => 2,
					'img_url' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/11/Thumbnail-v-1.jpg',
					'title' => 'Darurat! Alirkan Bantuan dan Kebahagiaan untuk Palestina'
				]
			],
			'articles' => [
				[
					'id' => 1,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/11/Thumbnail.jpg',
					'title' => 'Darurat! Alirkan Bantuan dan Kebahagiaan untuk Palestina. Satu Tindakan, Banyak Harapan!',
					'brand' => ucfirst('gerak menebar kebaikan'),
					'total_donation' => intval('26.103.953'),
					'terkumpul_dari' => intval('115.000.000'),
					'donasi' => 253,
					'expired' => '2 bulan, 16 hari lagi'
				],
				[
					'id' => 2,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/12/Thumbnail-Kembar-Siam.png',
					'title' => 'Mengancam! Kembar Siam Rawan Komplikasi ',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => intval('206.307'),
					'terkumpul_dari' => intval('54.000.000'),
					'donasi' => 11,
					'expired' => '4 bulan, 17 hari lagi'
				],
				[
					'id' => 3,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/11/Thumbnail-Abah-Dakir-1.jpg',
					'title' => 'Tolong! Abah Dakir Gendong Tumor 32 Tahun di Wajah',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => intval('140.566'),
					'terkumpul_dari' => intval('58.000.000'),
					'donasi' => 3,
					'expired' => '18 hari lagi'
				]
			],
			'contents' => ['Home/Carousel', 'Home/Articles']
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
