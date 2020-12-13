<?php

namespace Tests\Enjoys\Http;

use Enjoys\Http\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

class ServerRequestTest extends TestCase
{

    public function testGetRequest()
    {
        $request = new ServerRequest();
        $this->assertInstanceOf(ServerRequestInterface::class, $request->getRequest());
    }

    public function testServer()
    {
        $request = new ServerRequest();
        $this->assertSame($_SERVER, $request->server());
        $this->assertSame($_SERVER['PHP_SELF'], $request->server('PHP_SELF'));
    }

    public function testPost()
    {
    }

    public function testFiles()
    {
    }

    public function testGetMethod()
    {
    }

    public function testAddQuery()
    {
    }

    public function testGet()
    {
    }
}
