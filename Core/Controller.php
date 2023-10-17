<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace Core;

use App\Config\Environment;

abstract class Controller {
    
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
}

