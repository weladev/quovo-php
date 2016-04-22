<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

class Brokerage extends QuovoAbstract
{
    protected $app;

    protected $client;

    const PATH = 'brokerages';

    public function __construct(QuovoApp $app, QuovoClient $client)
    {
        $this->app = $app;
        $this->client = $client;
    }

    public function getAll()
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH
        );
    }
}