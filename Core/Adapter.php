<?php

/**
 * @author : Puji Ermanto <pujiermanto@gmail.com>
 * Polymorphism
 **/

namespace Core;

interface ControllerInterface
{
    public function index();
    public function all();
    public function create();
    public function update();
    public function delete();
}

interface ModelInterface
{
    public static function all($table);
    public static function findById($id);
    public static function create($data);
    public static function update($id, $data);
    public static function delete($id);
}

interface RouterInterface
{
    public static function group($prefix, $callback);
    public static function get($route, $handler);
    public static function post($route, $handler);
    public static function put($route, $handler);
    public static function delete($route, $handler);
    public static function run();
}

interface RequestApiInterface
{
    public static function getRequestHttp($url, $key, $type);
}

interface ViewInterface
{
    public static function render($viewName, $layout, $data);
}
