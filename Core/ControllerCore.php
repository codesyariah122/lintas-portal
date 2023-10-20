<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace Core;

use App\Config\Environment;
use System\{ApiSystem, ServiceSystem, ViewSystem};

abstract class ControllerCore implements ControllerInterface {

    public function __construct() {
        Environment::config();
        ServiceSystem::generateAccess('API_KEY', API_KEY);
    }

    abstract public function index();
    abstract public function all();
    abstract public function create();
    abstract public function update();
    abstract public function delete();

    protected function jsonResponse($data) {
        return ApiSystem::jsonResponseGenerate($data);
    }

    protected static function validateInput($data, $rules) {
        // using system
        return ApiSystem::inputValidationSystem($data, $rules);
    }

    protected static function render($view, $data)
    {
        return ViewSystem::renderViewSystem($view, $data);
    }
}

