<?php

namespace Wela;


use Wela\Entities\Brokerage;
use Wela\Entities\User;

class Quovo
{
    const VERSION = '0.0.1';

    protected $app;

    protected $client;

    public function __construct(array $param)
    {
        $this->app = new QuovoApp($param['user'], $param['password']);
        $this->client = new QuovoClient();
    }

    /**
     * @return QuovoApp
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @return Brokerage
     */
    public function brokerage()
    {
        return new Brokerage($this->app, $this->client);
    }

    public function user()
    {
        return new User($this->app, $this->client);
    }
}