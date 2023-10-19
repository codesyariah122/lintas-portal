<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace Core;

use App\Config\Environment;
use System\ApiSystem;

abstract class ControllerCore implements ControllerInterface {

    public function __construct() {
        Environment::config();
    }

    abstract public function index();
    abstract public function all();
    abstract public function create();
    abstract public function update();
    abstract public function delete();

    protected function jsonResponse($data) {
        echo json_encode($data);
    }

    protected static function validateInput($data, $rules) {
        // using system
        return ApiSystem::inputValidationSystem($data, $rules);
    }
}

