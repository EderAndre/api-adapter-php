<?php
declare(strict_types = 1);

namespace Gov\DpeRS\ApiAdapter\Application\Action\Audiencias;

use Psr\Container\ContainerInterface;

class GetAudicenciasByDefaultRangeHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetAudicenciasByDefaultRangeHandler
    {
        $configs = $container->get('config')['external-apis']['endpoints'];
        return new GetAudicenciasByDefaultRangeHandler($configs);
    }
}
