<?php

/**
 * @author : Puji Ermanto <pujiermanto@gmail.com>
 * @return {abstraction}
 **/

namespace Core;

use System\{ApiSystem, ServiceSystem, ViewSystem};

abstract class ControllerCore extends ViewSystem
implements ControllerInterface, ViewInterface
{

    public function __construct()
    {
        ServiceSystem::generateAccess('API_KEY', API_KEY);
    }

    abstract public function index();
    abstract public function all();
    abstract public function create();
    abstract public function update();
    abstract public function delete();

    protected function jsonResponse($data)
    {
        return ApiSystem::jsonResponseGenerate($data);
    }

    protected function cleanInput($input)
    {
        return ApiSystem::cleanInputSystem($input);
    }

    protected static function validateInput($data, $rules)
    {
        // using system
        return ApiSystem::inputValidationSystem($data, $rules);
    }

    public static function render($view, $layout, $data)
    {
        return self::renderViewSystem($view, $layout, $data);
    }
}
