<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapter\Middleware;

use Psr\Container\ContainerInterface;
use Gov\DpeRS\ApiAdapter\Middleware\Service\ApiTools;

class AuthenticationMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): AuthenticationMiddleware
    {
        $configs = $container->get('config')['external-apis']['auth'];
        $api = new ApiTools();
        return new AuthenticationMiddleware($configs, $api);
    }
}
