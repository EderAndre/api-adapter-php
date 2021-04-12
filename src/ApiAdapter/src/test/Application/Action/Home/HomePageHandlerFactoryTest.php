<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapterTest\Application\Action\Home;

use Gov\DpeRS\ApiAdapter\Application\Action\Home\HomePageHandler;
use Gov\DpeRS\ApiAdapter\Application\Action\Home\HomePageHandlerFactory;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Mezzio\Router;
use Mezzio\Template\TemplateRendererInterface;

class HomePageHandlerFactoryTest extends TestCase
{
    /** @var ContainerInterface|ObjectProphecy */
    protected $container;

    protected function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);
    }

    public function testFactoryWithoutTemplate()
    {
        $factory = new HomePageHandlerFactory();

        $this->assertInstanceOf(HomePageHandlerFactory::class, $factory);

        $homePage = $factory($this->container->reveal());

        $this->assertInstanceOf(HomePageHandler::class, $homePage);
    }

    public function testFactoryWithTemplate()
    {

        $factory = new HomePageHandlerFactory();

        $homePage = $factory($this->container->reveal());

        $this->assertInstanceOf(HomePageHandler::class, $homePage);
    }
}
