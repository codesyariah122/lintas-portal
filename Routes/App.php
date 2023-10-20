<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {Router}
**/
use App\Middleware\JsonResponseMiddleware;
use App\Config\Router;


Router::withMiddleware(JsonResponseMiddleware::class, function () {
    Router::get('/', 'HomeController@index');

    Router::group('/api/public', function (){
        Router::get('/get-ip', 'Api\Public\GeoLocatorController@getIp');
        Router::get('/geo-locator', 'Api\Public\GeoLocatorController@getLocator');
        Router::get('/province-lists', 'Api\Public\GeoLocatorController@provinceLists');
        Router::get('/city-lists', 'Api\Public\GeoLocatorController@cityLists');
        Router::get('/subdistrict', 'Api\Public\GeoLocatorController@subDistrict');
        Router::get('/ward-lists', 'Api\Public\GeoLocatorController@wardLists');
        Router::get('/search-location', 'Api\Public\GeoLocatorController@searchLocation');

    // Roles user lists
        Router::get('/roles', 'Api\Auth\RoleController@all');
    });

    Router::group('/api/auth', function(){
        Router::post('/add-role', 'Api\Auth\RoleController@create');
        Router::post('/new-register', 'Api\Auth\RegisterController@create');
    });
});


Router::run();