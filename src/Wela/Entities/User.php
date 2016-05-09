<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

class User extends QuovoAbstract
{
    protected $app;

    protected $client;

    const PATH = 'users';

    public function __construct(QuovoApp $app, QuovoClient $client)
    {
        $this->app = $app;
        $this->client = $client;
    }

    public function create(array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->post(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }

    public function find($id)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $id
        );
    }

    public function account()
    {
        return new UserAccount($this->app, $this->client);
    }
}