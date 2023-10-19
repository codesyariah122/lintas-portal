<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace Core;

abstract class RouterCore implements RouterInterface {
    abstract public static function group($prefix, $callback): void;
    abstract public static function get($route, $handler): void;
    abstract public static function post($route, $handler): void;
    abstract public static function put($route, $handler): void;
    abstract public static function delete($route, $handler): void;
    abstract public static function run(): void;
}

