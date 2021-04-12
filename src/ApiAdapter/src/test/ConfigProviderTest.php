<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapterTest;

use PHPUnit\Framework\TestCase;
use Gov\DpeRS\ApiAdapter\ConfigProvider;

class ConfigProviderTest extends TestCase
{

    private $configProvider;

    protected function setUp()
    {
        parent::setUp();

        $this->configProvider = new ConfigProvider();
    }

    public function testInvoke()
    {
        $this->assertIsArray($this->configProvider->__invoke());
    }

    public function testGetDependencies()
    {
        $this->assertIsArray($this->configProvider->getDependencies());
    }

    public function testGetTemplates()
    {
        $this->assertIsArray($this->configProvider->getTemplates());
    }
}
