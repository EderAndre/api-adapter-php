<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapterTest\Domain\Query\SampleMS;

use Psr\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllHandler;
use Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias\GetAllHandlerFactory;


class GetAllHandlerFactoryTest extends TestCase
{


    protected function setUp()
    {

    }

    public function testFactoryReturnCorrectType()
    {

        $factory = new GetAllHandlerFactory();

        $handler = $factory();

        $this->assertInstanceOf(GetAllHandlerFactory::class, $factory);

        $this->assertInstanceOf(GetAllHandler::class, $handler);
    }
}
