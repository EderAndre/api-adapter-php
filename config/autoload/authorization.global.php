<?php
declare(strict_types = 1);

return [
    'mezzio-authorization-acl' => [
        'roles' => [
            'API' => [],
        ],
        'resources' => [
            'home',
            'api.ping',
			'audiencias.get',
            'audienciasByRange.get'
        ],
        'allow' => [
            'API' => [
            ],
        ],
        // 'deny'=>['syndic' => [ 'api.tping.path',],]//deny example
    ],
];
