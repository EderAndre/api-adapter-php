<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapterTest\Application\Action\Ping;

use Gov\DpeRS\ApiAdapter\Application\Action\Ping\PingHandler;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\JsonResponse;

class PingHandlerTest extends TestCase
{
    public function testResponse()
    {
        $pingHandler = new PingHandler();
        $response = $pingHandler->handle(
            $this->prophesize(ServerRequestInterface::class)->reveal()
        );

        $json = json_decode((string) $response->getBody());

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertFalse(isset($json->ack));
    }
}
