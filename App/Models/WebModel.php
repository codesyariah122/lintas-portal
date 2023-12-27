<?php

namespace App\Models;

use Core\ModelCore;
use App\Resources\ApiResources;
use Core\ServiceContainer;


class WebModel extends ModelCore
{
	public static function all($name) {
		return parent::all($name);
	}

	public static function carousels()
	{
		try {
			$carousels = [
				[
					'id' => 1,
					'img_url' => 'https://amalsholeh-s3.imgix.net/user-media/odn387ywpHmHR97CbdIQYAaSXC1FXyJSivtKxdV0.png?&w=1000?w=534&fit=crop&auto=format,compress',
					'title' => 'Bergerak wujudkan niat baik'
				],
				[
					'id' => 2,
					'img_url' => 'https://amalsholeh-s3.imgix.net/user-media/TwG7c4kf1nLJadwyYtBcPLCWWy69A1eegIoWeooG.png?&w=1000?w=534&fit=crop&auto=format,compress',
					'title' => 'Pahala jariyah'
				],
				[
					'id' => 3,
					'img_url' => 'https://amalsholeh-s3.imgix.net/user-media/BpyRlibnaA7zz1oWGK8AqPFydGzyZrJAIz7UMegX.png?&w=1000?w=534&fit=crop&auto=format,compress',
					'title' => 'Wakaf sumur'
				],
				[
					'id' => 4,
					'img_url' => 'https://amalsholeh-s3.imgix.net/user-media/cklzBxsQxV2aJ7RDcfHTgnWPMnf8UDSkV40VsSQY.png?&w=1000?w=534&fit=crop&auto=format,compress',
					'title' => 'Bangun kembali masjid alikhlas'
				]
			];

			return ['success' => true, 'data' => $carousels];

		} catch (\Throw $th) {
			throw new  Exception("Error Processing Request", 1);
		}
	}

	public static function articles()
	{
		try {
			$articles = [
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
			];

			return ['success' => true, 'data' => $articles];

		} catch (\Throw $th) {
			throw new  Exception("Error Processing Request", 1);
		}
	}

	public static function findById($id){}

	public static function create($data){}

	public static function update($id, $data){}
	
	public static function delete($id){}
}
