<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace Core;

abstract class RouterCore{
    abstract public function group($prefix, $callback): void;
    abstract public function get($route, $handler): void;
    abstract public function post($route, $handler): void;
    abstract public function put($route, $handler): void;
    abstract public function delete($route, $handler): void;
    abstract public function run(): void;
}

