<?php
namespace App\Controllers\Api\Users;

use Core\ControllerCore;
use App\Models\RoleModel;
use App\Resources\ApiResources;

class RoleController extends ControllerCore {
	
	public function index(){}

	public function all(){
		$data = RoleModel::all('roles');
		$response = ApiResources::createSuccessResponse('List of roles!', $data);

		$this->jsonResponse($response);
	}

	public function create()
	{
		$data = $this->cleanInput(@$_REQUEST);

		if (RoleModel::isRoleExists($data['name'])) {
			$response = ApiResources::createErrorResponse('Role with the same name already exists.');
		} else {
			$roleId = RoleModel::create($data);

			if (is_numeric($roleId)) {
				$response = ApiResources::createSuccessResponse('Role created successfully!', ['role_id' => $roleId, 'name' => $data['name']]);
			} else {
				$response = ApiResources::createErrorResponse('Failed to create role: ' . $roleId);
			}
		}

		$this->jsonResponse($response);
	}

	public function update(){}

	public function delete(){}
}