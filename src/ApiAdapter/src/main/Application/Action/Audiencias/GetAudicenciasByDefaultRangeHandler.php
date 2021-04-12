<?php
declare(strict_types = 1);

namespace Gov\DpeRS\ApiAdapter\Application\Action\Audiencias;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllByDefaultRangeHandler;

class GetAudicenciasByDefaultRangeHandler implements RequestHandlerInterface
{
    private $configs=[];
    public function __construct(array $configs)
    {
        $this->configs= $configs;
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getQueryParams();
        $bearer=$request->getAttribute('bearer');
        $result = new GetAllByDefaultRangeHandler($params, $bearer, $this->configs);

        return new JsonResponse([
            'audiencias' => $result->handle()
        ]);
    }
}
