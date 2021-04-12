<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use OpenApi\Annotations as OA;

return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container): void {
    $app->get('/', Gov\DpeRS\ApiAdapter\Application\Action\Home\HomePageHandler::class, 'home');

    $app->get('/api/ping', Gov\DpeRS\ApiAdapter\Application\Action\Ping\PingHandler::class, 'api.ping');

    $app->get(
        '/api/v1/audiencias',
        Gov\DpeRS\ApiAdapter\Application\Action\Audiencias\GetAudicenciasByDefaultRangeHandler::class,
        'audiencias.get'
        );

    $app->get(
        '/api/v1/audienciasbyrange',
        Gov\DpeRS\ApiAdapter\Application\Action\Audiencias\GetAudicenciasByIdDefensor::class,
        'audienciasByRange.get'
        );

};
