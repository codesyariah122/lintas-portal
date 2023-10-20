<?php
namespace App\Controllers\Api\Public;

use System\ApiSystem;
use Core\ControllerCore;
use Core\Headers;
use Core\RequestApi;
use App\Resources\ApiResources;

class GeoLocatorController extends ControllerCore {

	public function index(){}

	public function all(){}

	public function create(){}

	public function update(){}

	public function delete(){}

	public function getIp()
	{
		try {
			$api_url = IP_API_URL;
			$ip = RequestApi::getRequestHttp($api_url, '', 'fileContents');
			$ipData = json_decode($ip);

			if ($ipData && property_exists($ipData, 'ip')) {
				$dataResponse = ApiResources::createSuccessResponse('Ip public has been trapped!', ['ip' => $ipData->ip]);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error trapping your public IP!', null);
			}

			$this->jsonResponse($dataResponse);
		} catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Public IP not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function getLocator()
	{
		try {
			$ip = @$_GET['ip'];
			$api_url = GEO_API_URL.$ip.'/json';
			$geo = RequestApi::getRequestHttp($api_url, '', 'fileContents');
			$geoData = json_decode($geo);

			if ($geoData && property_exists($geoData, 'ip')) {
				$dataResponse = ApiResources::createSuccessResponse('Successfully fetched data geo!', ['geo_data' => $geoData]);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data geo!', null);
			}

			$this->jsonResponse($dataResponse);
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function provinceLists()
	{
		try {
			$api_key = GEODATA_API_KEY;
			$api_url = GEODATA_API_URL.'/provinsi?api_key='.$api_key;			
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');
			$provinceData = json_decode($response);


			if ($provinceData) {
				$dataResponse = ApiResources::responseNoStatusMessage($provinceData);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data province!', null);
			}

			$this->jsonResponse($dataResponse);
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function cityLists()
	{
		try {
			$api_key = GEODATA_API_KEY;
			$province_id = @$_GET['provinsi_id'];
			$api_url = GEODATA_API_URL.'/kota?provinsi_id='.$province_id.'&api_key='.$api_key;
			
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');

			$cityData = json_decode($response);


			if ($cityData) {
				$dataResponse = ApiResources::responseNoStatusMessage($cityData);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data city!', null);
			}

			$this->jsonResponse($dataResponse);
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function subDistrict()
	{
		try {
			$api_key = GEODATA_API_KEY;
			$city_id = @$_GET['city_id'];
			$api_url = GEODATA_API_URL.'/kecamatan?kota_id='.$city_id.'&api_key='.$api_key;
			
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');

			$districtData = json_decode($response);


			if ($districtData) {
				$dataResponse = ApiResources::responseNoStatusMessage($districtData);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data sub district!', null);
			}

			$this->jsonResponse($dataResponse);
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function wardLists()
	{
		try {
			$api_key = GEODATA_API_KEY;
			$subdistrict_id = @$_GET['subdistrict_id'];
			$api_url = GEODATA_API_URL.'/kelurahan?kecamatan_id='.$subdistrict_id .'&api_key='.$api_key;
			
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');

			$wardData = json_decode($response);


			if ($wardData) {
				$dataResponse = ApiResources::responseNoStatusMessage($wardData);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data sub district!', null);
			}

			$this->jsonResponse($dataResponse);
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function searchLocation()
	{
		try {
			$api_key = GEODATA_API_KEY;
			$keyword = @$_GET['search'];
			$api_url = GEODATA_SEARCH_API_URL.'?search='.$keyword .'&api_key='.$api_key;
			
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');

			$searchData = json_decode($response);


			if ($searchData) {
				$dataResponse = ApiResources::fromResponseToResult($searchData);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data sub district!', null);
			}

			$this->jsonResponse($dataResponse);
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}
}