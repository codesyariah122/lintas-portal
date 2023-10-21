<?php

/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return :void
* @desc : File ini difungsikan untuk menangani request url dari client dan setiap method menentukan rute mana yang akan di gunakan dari request url di sisi client
**/

namespace App\Config;

use Core\RouterCore;
use App\Middleware\JsonResponseMiddleware;
use App\Controllers\NotFoundController;

class Router extends RouterCore {

    private static $routes = [];
    private static $groupPrefix = '';
    private static $middlewareStack = [];


    public static function withMiddleware($middleware, $callback) {
        self::$middlewareStack[] = $middleware::setResponse('Content-Type', 'application/json');
        self::$middlewareStack[] = $middleware::setResponse('Accept', 'application/json');
        
        $callback();

        array_pop(self::$middlewareStack);
    }

    public static function group($prefix, $callback): void {
        self::$groupPrefix = $prefix;
        $callback();
        self::$groupPrefix = '';
    }

    public static function get($route, $handler): void {
        self::addRoute('GET', self::$groupPrefix . $route, $handler);
    }


    private static function addRoute($method, $route, $handler): void {
        $paramPattern = ($method === 'GET') ? '{param}' : '{dataParam}';
        $route = str_replace($paramPattern, '([^/]+)', $route);
        self::$routes[$route] = $handler;
    }

    /**
     * Menambahkan route POST
     * 
     * @param string $route Route yang akan ditambahkan
     * @param string $handler Handler untuk route tersebut
     * @return void
     */
    public static function post($route, $handler): void {
        self::addRoute('POST', self::$groupPrefix . $route, $handler);
    }

    public static function put($route, $handler): void {
        self::addRoute('PUT', $route, $handler);
    }

    public static function delete($route, $handler): void {
        self::addRoute('DELETE', $route, $handler);
    }

    
    public static function run(): void {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');

        foreach (self::$routes as $route => $handler) {
            $pattern = '#^' . $route . '$#';
            if (preg_match($pattern, $uri, $matches)) {
                $handlerParts = explode('@', $handler);
                $controllerName = $handlerParts[0];
                $methodName = $handlerParts[1];

                $controllerNamespace = 'App\Controllers\\' . $controllerName;
                $controller = new $controllerNamespace();

                array_shift($matches);
                $dataParam = end($matches);

                call_user_func([$controller, $methodName], $dataParam);

                return;
            }
        }

        http_response_code(404);
        header("HTTP/1.0 404 Not Found");

        new NotFoundController();
    }
}

