<?php
/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
 * */

namespace App\Controllers\Api\Portal;

use Core\ControllerCore;
use Core\RequestApi;
use App\Resources\ApiResources;
use App\Models\{ArticleModel, UserModel};

class ArticleController extends ControllerCore {
	public function index(){}

	public function all(){
		try {
			$result = ArticleModel::all('articles');
			if(count($result) > 0) {
				$this->jsonResponse(['message' => "List of articles!", 'data' => $result]);
			}
		} catch (\Exception $e) {
			$this->jsonResponse(['errors' => $e->getMessage()]);
		}
	}

	public function searchLocation($key)
	{
		try {
			$api_key = GEODATA_API_KEY;
			$api_url = GEODATA_SEARCH_API_URL.'?search='.$key .'&api_key='.$api_key;
			
			$response = RequestApi::getRequestHttp($api_url, '', 'fileContents');

			$searchData = json_decode($response);


			if ($searchData) {
				$dataResponse = ApiResources::fromResponseToResult($searchData);
			} else {
				$dataResponse = ApiResources::createSuccessResponse('Error fetched data sub district!', null);
			}

			return $dataResponse->data->results[0]->displayName;
		}catch (\Exception $h) {
			$errorResponse = ApiResources::createErrorResponse('Data not found!');
			$this->jsonResponse($errorResponse);
		}
	}

	public function create()
	{
		$data = $this->cleanInput(@$_REQUEST);
		$cover = @$_FILES['cover'];

		$userDataLogin = UserModel::getUserByRoles($_SESSION['roles'])['id'];

		$validationRules = [
			'title' => ['text' => 'text', 'minLength' => 5],
			'content' => ['text' => 'text'],
		];

		$validationErrors = $this->validateInput($data, $validationRules);

		if ($cover['error'] !== UPLOAD_ERR_OK) {
			$validationErrors['cover'] = "Error uploading cover.";
		}

		$maxFileSize = 1 * 1024 * 1024;
		if ($cover['size'] > $maxFileSize) {
			$validationErrors['cover'] = "Cover should be at most 10 MB.";
		}

		$allowedMimes = ['image/jpeg', 'image/jpg', 'image/png'];
		if (!in_array($cover['type'], $allowedMimes)) {
			$validationErrors['cover'] = "Cover must be a JPG, JPEG, or PNG file.";
		}

		$imageInfo = @getimagesize($cover['tmp_name']);
		if ($imageInfo === false) {
			$validationErrors['cover'] = "Cover is not a valid image file.";
		}

		if (!empty($validationErrors)) {
			$this->jsonResponse(['errors' => $validationErrors]);
			return;
		}

		$uploadDirectory = "storage/uploads/articles/";

		if (!is_dir($uploadDirectory)) {
			mkdir($uploadDirectory, 0777, true);
		}

		$originalFileName = $cover['name'];
		$extension = pathinfo($originalFileName, PATHINFO_EXTENSION); 
		$datetimeString = date('Y-m-d-His');

		$newFileName = $datetimeString . '_' . $originalFileName;

		$targetPath = $uploadDirectory . $newFileName;

		if (move_uploaded_file($cover['tmp_name'], $targetPath)) {
			$location = $this->searchLocation($data['location']);

			$articleData = [
				'title' => $data['title'],
				'cover' => $newFileName,
				'cover_caption' => $data['cover_caption'],
				'content' => $data['content'],
				'published_at' => date('Y-m-d H:i:s'),
				'user_id' => $userDataLogin,
				'location' => $location
			];

			$result = ArticleModel::create($articleData);

			if ($result['success']) {
				$newArticle = ArticleModel::findById($result['last_insert_id']);
				$this->jsonResponse(['message' => $result['message'], 'data' => $newArticle['data']]);
			} else {
				$this->jsonResponse(['errors' => ['database' => 'Gagal menyimpan artikel']]);
			}

		} else {
			echo "Failed to move the uploaded file.";
		}
	}


	public function update(){}

	public function delete(){}
}