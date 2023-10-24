<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return : {Router::Class} {Controller@Method}
**/
use App\Middleware\{JsonResponseMiddleware, AuthenticationMiddleware};
use App\Config\Router;
use Core\Commons\UriAccessCore;

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');
$trimmedUri = rtrim($uri, '/');

// var_dump(UriAccessCore::rules()); die;

if(strpos($trimmedUri, '/api/access') === 0) {    
    Router::authMiddleware(AuthenticationMiddleware::class, function() {
        Router::group('/api/access', function() {
            Router::post('/logout', 'Api\Auth\LoginController@logout');
            Router::get('/user-data', 'Api\Users\UserDataController@index');

            // Owner Access
            Router::post('/add-role', 'Api\Users\RoleController@create');
            Router::post('/add-owner', 'Api\Users\UserOwnerController@create');
            Router::get('/roles', 'Api\Users\RoleController@all');

            // Author Access
            Router::post('/add-article', 'Api\Portal\ArticleController@create');
        });
    });
} else if (strpos($trimmedUri, '/api/auth') === 0) {
    Router::jsonMiddleware(JsonResponseMiddleware::class, function() {
        Router::group('/api/auth', function() {
            Router::post('/login', 'Api\Auth\LoginController@create');
        });
    });
} else {
    Router::jsonMiddleware(JsonResponseMiddleware::class, function () {
        Router::group('/api/public', function (){
            Router::get('/get-ip', 'Api\Public\GeoLocatorController@getIp');
            Router::get('/geo-locator', 'Api\Public\GeoLocatorController@getLocator');
            Router::get('/province-lists', 'Api\Public\GeoLocatorController@provinceLists');
            Router::get('/city-lists', 'Api\Public\GeoLocatorController@cityLists');
            Router::get('/subdistrict', 'Api\Public\GeoLocatorController@subDistrict');
            Router::get('/ward-lists', 'Api\Public\GeoLocatorController@wardLists');
            Router::get('/search-location', 'Api\Public\GeoLocatorController@searchLocation');
        });

        Router::group('/api/user', function(){
            Router::post('/new-register', 'Api\Auth\RegisterController@create');
        });
    });
}


Router::run();