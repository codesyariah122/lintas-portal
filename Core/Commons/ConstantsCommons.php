<?php

namespace Core\Commons;

class ConstantsCommons
{
    protected static $environmentVariables = [
        'BASE_URL',
        'PRIVATE_KEY_PATH',
        'API_KEY',
        'SECRET_KEY',
        'HOST_DB',
        'USER_DB',
        'DB_PW',
        'DB',
        'IP_API_URL',
        'GEO_API_URL',
        'GEODATA_API_URL',
        'GEODATA_API_KEY',
        'GEODATA_SEARCH_API_URL',
        'ENV_DEV'
    ];

    public static $routes = [
        'owner' => [
            '/api/access/add-role',
            '/api/access/add-owner',
            '/api/access/roles'
        ],
        'authors' => [
            '/api/access/add-article'
        ],
        'users' => []
    ];

    public static $routeLists = [
        '/Routes/Web.php',
        '/Routes/Api.php'
    ];

    public static $rules = [
        'prefix' => [
            ['uri' => '/api/access'],
            ['uri' => '/api/auth'],
            ['uri' => '/api/public']
        ],
        'suffix' => [
            ['uri' => '/roles'],
            ['uri' => '/add-role'],
            ['uri' => '/add-owner']
        ],
    ];
}
