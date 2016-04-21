<?php

namespace Wela\Authentication;

use Wela\Cache\Cache;

class AccessToken
{
    protected $token = '';

    protected $config;

    protected $cache;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->cache = new Cache();
        $this->setToken();
    }

    public function setToken()
    {
        $token = json_encode(['test' => 'test']);
        $this->cache->create('access_token.json', $token);
    }

    public function getToken()
    {

    }


}