<?php
declare(strict_types=1);

return [
    'external-apis' => [
        'auth' => [
            'AUTH_BASE_URL' => $_ENV['AUTH_BASE_URL'],
            'AUTH_AUTHORIZE' => $_ENV['AUTH_AUTHORIZE'],
            'AUTH_TOKEN'=>$_ENV['AUTH_TOKEN'],
            'AUTH_RESOURCE' => $_ENV['AUTH_RESOURCE'],
            'AUTH_USERNAME' => $_ENV['AUTH_USERNAME'],
            'AUTH_PWD' => $_ENV['AUTH_PWD'],
            'AUTH_CLIENT_ID' => $_ENV['AUTH_CLIENT_ID'],
            'AUTH_CLIENT_SECRET' => $_ENV['AUTH_CLIENT_SECRET'],
            'AUTH_API_HASH' => $_ENV['AUTH_API_HASH'],
            'AUTH_API_USER' => $_ENV['AUTH_API_USER'],
        ],
       'endpoints' => [
            'EXTERNAL_API_PORTAL' => $_ENV['EXTERNAL_API_PORTAL'],
            'EXTERNAL_API_PORTAL_AUDIENCIA' => $_ENV['EXTERNAL_API_PORTAL_AUDIENCIA'],
        ]
        
    ],
];
