<?php

use GuzzleHttp\Client;
use Bravist\CnvexWhiteFinance\Api;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    protected $http;

    private function getDefaults()
    {
        $app = [
                /**
                 * The white finance api host
                 */
                'host' => '120.77.23.62',
                /**
                 * The white finance api host port
                 */
                'port' => '6666',
                /**
                 * Protocol
                 */
                'protocol' => 'http',

                /**
                 * Debug mode
                 */
                'debug' => true,
            ];

        $this->http = new Api(new Client(), $app);
    }

    public function testSupportWhiteFinance()
    {
        $this->getDefaults();
        $res = $this->http->supportWhiteFinance('7777777');
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }

    public function testSubscribeWhiteFinance()
    {
        $this->getDefaults();
        $res = $this->http->subscribeWhiteFinance('7777777');
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }

    public function testCheckWhiteFinance()
    {
        $this->getDefaults();
        $res = $this->http->checkWhiteFinance('7777777');
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }

    public function testCreateWhiteFinance()
    {
        $this->getDefaults();
        $res = $this->http->createWhiteFinance('7777777', 1002, 100);
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }

    public function testExecuteWhiteFinance()
    {
        $this->getDefaults();
        $res = $this->http->executeWhiteFinance('7777777', 1002, 100, 100);
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }

    public function testQueryWhiteFinance()
    {
        $this->getDefaults();
        $res = $this->http->queryWhiteFinance('7777777');
        print_r($this->http->getUrl());
        print_r($this->http->getRequest());
        print_r($this->http->getResponse());
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }
}
