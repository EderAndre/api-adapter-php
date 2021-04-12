<?php

declare(strict_types = 1);

namespace Gov\DpeRS\ApiAdapterTest\Middleware\Service;

use Gov\DpeRS\ApiAdapter\Middleware\Service\ApiTools;
use PHPUnit\Framework\TestCase;

class ApiToolsTest extends TestCase
{
    public function testConsumer()
    {
        $api = new ApiTools();
        $content = $api->consumeExternalApi('http://google.com');
        $this->assertNotnull($content);
    }
}
