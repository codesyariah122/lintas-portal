<?php
namespace System;

class Request {

	private $data;

    public function __construct() {
        $this->data = array_merge(@$_GET, @$_REQUEST);
    }

    public function input($key, $default = null) {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    public function all() {
        return $this->data;
    }
}