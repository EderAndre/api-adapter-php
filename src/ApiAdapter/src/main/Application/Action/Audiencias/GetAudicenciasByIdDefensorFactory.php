<?php
declare(strict_types = 1);

namespace Gov\DpeRS\ApiAdapter\Application\Action\Audiencias;

use Psr\Container\ContainerInterface;

class GetAudicenciasByIdDefensorFactory
{
    public function __invoke(ContainerInterface $container): GetAudicenciasByIdDefensor
    {
        $configs = $container->get('config')['external-apis']['endpoints'];
        return new GetAudicenciasByIdDefensor($configs);
    }
}
