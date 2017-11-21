<?php

namespace Bravist\CnvexWhiteFinance;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
*
*/
class Request
{
    public $host;

    public $port;

    public $protocol;

    public $client;

    public $debug;

    public $logger;

    public function __construct(Client $client, array $config)
    {
        $this->client = $client;
        $this->setConfig($config);
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;
        return $this;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function setHost($host)
    {
        $this->$host = $host;
        return $this;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    public function getApiHost()
    {
        return sprintf('%s://%s:%s', $this->getProtocol(), $this->getHost(), $this->getPort());
    }

    public function send($method, $uri, $params)
    {
        return $this->$method($uri, $params);
    }

    public function get($uri, $params)
    {
        try {
            $api = sprintf('%s/%s', $this->getApiHost(), $uri);
            $response = $this->client->request('GET', $api, [
                'query' => $params
            ]);

            if ($this->getDebug()) {
                $this->getLogger()->debug('===Host:===');
                $this->getLogger()->debug($api);
                $this->getLogger()->debug('===Parameters:===');
                $this->getLogger()->debug($params);
                $this->getLogger()->debug('===Response:===');
                $this->getLogger()->debug((string) $response->getBody());
            }
            $res = json_decode((string) $response->getBody());
            return $res;
        } catch (RequestException $e) {
            throw $e;
        }
    }

    public function post($uri, $params)
    {
        try {
            $api = sprintf('%s/%s', $this->getApiHost(), $uri);
            $response = $this->client->request('POST', $api, [
                'json' => $params
            ]);

            if ($this->getDebug()) {
                $this->getLogger()->debug('===Host:===');
                $this->getLogger()->debug($api);
                $this->getLogger()->debug('===Parameters:===');
                $this->getLogger()->debug($params);
                $this->getLogger()->debug('===Response:===');
                $this->getLogger()->debug((string) $response->getBody());
            }
            $res = json_decode((string) $response->getBody());
            return $res;
        } catch (RequestException $e) {
            throw $e;
        }
    }

    public function setConfig(array $config)
    {
        foreach ($config as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }
}
