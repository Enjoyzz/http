<?php

namespace Tests\Enjoys\Http;

use Enjoys\Http\ServerRequest;
use HttpSoft\ServerRequest\ServerRequestCreator;
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
        $this->assertSame(null, $request->server('NOT_ISSET'));
    }

    public function testPost()
    {
        $request = new ServerRequest(
            new \HttpSoft\Message\ServerRequest(
                [], [], [], [], [
                      'test' => 'value'
                  ]
            )
        );
        $this->assertSame('value', $request->post('test'));
        $this->assertSame(['test' => 'value'], $request->post());
        $this->assertSame('default_value', $request->post('not_isset', 'default_value'));
    }


    public function methods()
    {
        return [
            ['POST'],
            ['GET'],
            ['PUT'],
            ['DELETE'],
        ];
    }

    /**
     * @dataProvider methods
     */
    public function testGetMethod($method)
    {
        $request = new ServerRequest(
            ServerRequestCreator::createFromGlobals(
                [
                    'REQUEST_METHOD' => $method
                ]
            )
        );
        $this->assertSame($method, $request->getMethod());
    }

    public function testAddQuery()
    {
        $request = new ServerRequest(
            new \HttpSoft\Message\ServerRequest(
                [], [], [], [
                      'test' => 'value'
                  ]
            )
        );
        $request->addQuery(
            [
                'test2' => 'value2'
            ]
        );

        $this->assertSame(['test' => 'value', 'test2' => 'value2'], $request->get());

        $request->addQuery(
            [
                'test' => 'value3'
            ]
        );

        $this->assertSame(['test' => 'value3', 'test2' => 'value2'], $request->get());
    }

    public function testGet()
    {
        $request = new ServerRequest(
            new \HttpSoft\Message\ServerRequest(
                [], [], [], [
                      'test' => 'value'
                  ]
            )
        );
        $this->assertSame('value', $request->get('test'));
        $this->assertSame(['test' => 'value'], $request->get());
        $this->assertSame('default_value', $request->get('not_isset', 'default_value'));
    }


//    public function testFiles()
//    {
//    }
}
