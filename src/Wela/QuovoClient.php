<?php

namespace Wela;

use GuzzleHttp\Client;

class QuovoClient
{
    protected $client;

    const BASE_API_URL = 'https://api.quovo.com/';

    const VERSION = 'v2/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => static::BASE_API_URL.static::VERSION,
            'timeout' => 30
        ]);

        return $this->client;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}