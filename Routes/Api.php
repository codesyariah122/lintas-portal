<?php
/**
 * @author : Puji Ermanto <pujiermanto@gmail.com>
 * @return : {Router::Class} {Controller@Method}
 **/
use App\Middleware\{JsonResponseMiddleware, AuthenticationMiddleware};
use App\Config\Router;

$trimmedUri = Router::trimmedUriString();
$apiPrefix = Router::$apiPrefix;

// Base on authentication middleware access 
if(strpos($trimmedUri, "{$apiPrefix}/access") === 0) {
    Router::authMiddleware(AuthenticationMiddleware::class, function () use ($apiPrefix) {
        Router::group($apiPrefix . '/access', function () {
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
}


if (strpos($trimmedUri, "{$apiPrefix}/auth") == 0) {
    Router::jsonMiddleware(JsonResponseMiddleware::class, function () use ($apiPrefix) {
        Router::group($apiPrefix . '/auth', function () {
            Router::post('/login', 'Api\Auth\LoginController@create');
        });
    });
}


// Public middleware access
Router::jsonMiddleware(JsonResponseMiddleware::class, function () use ($apiPrefix) {
    Router::group($apiPrefix . '/public', function () {
        Router::get('/get-ip', 'Api\Public\GeoLocatorController@getIp');
        Router::get('/geo-locator', 'Api\Public\GeoLocatorController@getLocator');
        Router::get('/province-lists', 'Api\Public\GeoLocatorController@provinceLists');
        Router::get('/city-lists', 'Api\Public\GeoLocatorController@cityLists');
        Router::get('/subdistrict', 'Api\Public\GeoLocatorController@subDistrict');
        Router::get('/ward-lists', 'Api\Public\GeoLocatorController@wardLists');
        Router::get('/search-location', 'Api\Public\GeoLocatorController@searchLocation');
        
        // Article Lists
        Router::get('/article-lists', 'Api\Portal\ArticleController@all');
    });

    Router::group($apiPrefix . '/user', function () {
        Router::post('/new-register', 'Api\Auth\RegisterController@create');
    });
});



Router::run();
