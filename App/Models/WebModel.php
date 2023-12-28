<?php

namespace App\Models;

use Core\ModelCore;
use App\Resources\ApiResources;
use Core\ServiceContainer;


class WebModel extends ModelCore
{
	public static function all($name)
	{
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
		} catch (\Throwable $th) {
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
					'total_donation' => '26.103.953',
					'terkumpul_dari' => '115.000.000',
					'donasi' => 253,
					'expired' => '60 Hari'
				],
				[
					'id' => 2,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/12/Thumbnail-Kembar-Siam.png',
					'title' => 'Mengancam! Kembar Siam Rawan Komplikasi ',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => '206.307',
					'terkumpul_dari' => '54.000.000',
					'donasi' => 11,
					'expired' => '40 Hari'
				],
				[
					'id' => 3,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/11/Thumbnail-Abah-Dakir-1.jpg',
					'title' => 'Tolong! Abah Dakir Gendong Tumor 32 Tahun di Wajah',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => '140.566',
					'terkumpul_dari' => '58.000.000',
					'donasi' => 3,
					'expired' => '18 Hari'
				]
			];

			return ['success' => true, 'data' => $articles];
		} catch (\Throwable $th) {
			throw new  Exception("Error Processing Request", 1);
		}
	}

	public static function jariyahs()
	{
		try {
			$articles = [
				[
					'id' => 1,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/10/Sedekah-Air.png',
					'title' => 'Sedekah Jariyah Tak Terputus Alirkan Air untuk Pondok dan Masjid',
					'brand' => ucfirst('gerak menebar kebaikan'),
					'total_donation' => '0',
					'terkumpul_dari' => '45.000.000',
					'donasi' => 0,
					'expired' => '35 Hari'
				],
				[
					'id' => 2,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/10/Sedekah-Quran.png',
					'title' => 'Sedekah Jariyah Tebar 100RIBU Quran Hingga Pelosok',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => '0',
					'terkumpul_dari' => '25.000.000',
					'donasi' => 0,
					'expired' => '18 Hari'
				],
				[
					'id' => 3,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/10/Abahs.png',
					'title' => 'Istrinya Meninggal karna Tumor, Anaknya mengalami Kebutaan dan ODGJ.',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => '0',
					'terkumpul_dari' => '25.000.000',
					'donasi' => 0,
					'expired' => '21 Hari'
				]
			];

			return ['success' => true, 'data' => $articles];
		} catch (\Throwable $th) {
			throw new  Exception("Error Processing Request", 1);
		}
	}

	public static function metas()
	{
		try {
			$metas = [
				[
					'id' => 1,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/10/Sedekah-Air.png',
					'title' => 'Sedekah Jariyah Tak Terputus Alirkan Air untuk Pondok dan Masjid',
					'brand' => ucfirst('gerak menebar kebaikan'),
					'total_donation' => '0',
					'terkumpul_dari' => '45.000.000',
					'donasi' => 0,
					'expired' => '35 Hari'
				],
				[
					'id' => 2,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/10/Sedekah-Quran.png',
					'title' => 'Sedekah Jariyah Tebar 100RIBU Quran Hingga Pelosok',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => '0',
					'terkumpul_dari' => '25.000.000',
					'donasi' => 0,
					'expired' => '18 Hari'
				],
				[
					'id' => 3,
					'img' => 'https://wahdahinisiatifkebaikan.org/wp-content/uploads/2023/10/Abahs.png',
					'title' => 'Istrinya Meninggal karna Tumor, Anaknya mengalami Kebutaan dan ODGJ.',
					'brand' => ucfirst('inisiatif kebaikan'),
					'total_donation' => '0',
					'terkumpul_dari' => '25.000.000',
					'donasi' => 0,
					'expired' => '21 Hari'
				]
			];

			return ['success' => true, 'data' => $metas];
		} catch (\Throwable) {
			throw new  Exception("Error Processing Request", 1);
		}
	}

	public static function findById($id)
	{
	}

	public static function create($data)
	{
	}

	public static function update($id, $data)
	{
	}

	public static function delete($id)
	{
	}
}
