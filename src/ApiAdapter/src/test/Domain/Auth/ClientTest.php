<?php

declare(strict_types = 1);

namespace Gov\DpeRS\ApiAdapterTest\Domain\Auth;

use PHPUnit\Framework\TestCase;
use Gov\DpeRS\ApiAdapter\Domain\Auth\Client;

class ClientTest extends TestCase
{
    protected $deleteDefaulterListHandler;



    public function testHandle()
    {
        $client=new Client(true, false, 'ALLOW', 'access granted');

        $this->assertTrue($client->authenticated);
        $this->assertFalse($client->requestUserToken);
        $this->assertEquals($client->message, 'access granted');
        $this->assertEquals($client->status, 'ALLOW');
    }
}
