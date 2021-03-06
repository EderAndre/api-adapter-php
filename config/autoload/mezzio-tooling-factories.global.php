<?php
/**
 * This file generated by Mezzio\Tooling\Factory\ConfigInjector.
 *
 * Modifications should be kept at a minimum, and restricted to adding or
 * removing factory definitions; other dependency types may be overwritten
 * when regenerating this file via mezzio-tooling commands.
 */
declare(strict_types = 1);

return [
    'dependencies' => [
        'invokables' => [

        ],
        'services' => [

        ],
        'factories' => [
            Gov\DpeRS\ApiAdapter\Application\Action\Home\HomePageHandler::class =>
                Gov\DpeRS\ApiAdapter\Application\Action\Home\HomePageHandlerFactory::class,

            Gov\DpeRS\ApiAdapter\Middleware\AuthenticationMiddleware::class =>
            Gov\DpeRS\ApiAdapter\Middleware\AuthenticationMiddlewareFactory::class,

            
            Gov\DpeRS\ApiAdapter\Application\Action\Audiencias\GetAudicenciasByIdDefensor::class=>
                Gov\DpeRS\ApiAdapter\Application\Action\Audiencias\GetAudicenciasByIdDefensorFactory::class,
            Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllHandler::class=>
                Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllHandlerFactory::class,
            
            Gov\DpeRS\ApiAdapter\Application\Action\Audiencias\GetAudicenciasByDefaultRangeHandler::class=>
                Gov\DpeRS\ApiAdapter\Application\Action\Audiencias\GetAudicenciasByDefaultRangeHandlerFactory::class,
            Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllByDefaultRangeHandler::class=>
                Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllByDefaultRangeHandlerFactory::class,
    

                    ]
    ]
];
