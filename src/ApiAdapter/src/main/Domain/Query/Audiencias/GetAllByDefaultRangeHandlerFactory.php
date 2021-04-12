<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias;

use Psr\Container\ContainerInterface;

class GetAllByDefaultRangeHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetAllHandler
    {
        $configs = $container->get('config')['external-apis']['endpoints'];
        return new GetAllHandler($configs);
    }
}
