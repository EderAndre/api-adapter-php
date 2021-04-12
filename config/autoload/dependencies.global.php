<?php
declare(strict_types = 1);

return [

    'dependencies' => [
        'aliases' => [
            Mezzio\Authorization\AuthorizationInterface::class =>
                Mezzio\Authorization\Acl\LaminasAcl::class
        ],
        'invokables' => [
            Symfony\Component\Console\Application::class,
        ],
        'factories' => [
            Com\DpeRS\ApiAdapter\Middleware\AuthenticationMiddleware::class=>
                Com\DpeRS\ApiAdapter\Middleware\AuthenticationMiddlewareFactory::class,
            Mezzio\Router\RouterInterface::class =>
                Mezzio\Router\FastRouteRouterFactory::class,

        ]
    ]
];
