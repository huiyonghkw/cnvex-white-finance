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
        $res = $this->http->supportWhiteFinance('513126198308270030');
        print_r($res);
        $this->assertObjectHasAttribute('data', $res);
    }
}
