<?php

namespace Wela\Authentication;

use GuzzleHttp\Client;
use Wela\Cache\Cache;

class AccessToken
{
    const BASE_AUTH_URL = 'https://api.quovo.com/';

    protected $config;

    protected $cache;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->cache = new Cache();
        $this->setToken();
    }

    private function setToken()
    {
        if($this->isExpired())
        {
            $client = new Client([
                'base_uri' => static::BASE_AUTH_URL,
                'timeout' => 5
            ]);

            $response = $client->request('POST', 'v2/tokens', [
                'auth' => [
                    $this->config['user'],
                    $this->config['password']
                ],
                'json' => [
                    'name' => uniqid().'_main_token'
                ]
            ]);

            $token = json_decode($response->getBody()->getContents());
            $exp = new \DateTime($token->access_token->expires);
            $now = new \DateTime();

            $this->cache->create('access_token.json', json_encode($token), $exp->diff($now)->s);
        }
    }

    public function getValue()
    {
        return json_decode($this->cache->getCache('access_token.json'));
    }

    public function isExpired()
    {
        $expired = true;

        if($this->cache->check('access_token.json'))
        {
            $auth = $this->getValue();
            $now = new \DateTime();
            $expireTime = new \DateTime($auth->access_token->expires);

            if($now < $expireTime)
            {
                $expired = false;
            }
        }

        return $expired;
    }

    public function __toString()
    {
        return $this->getValue();
    }
}