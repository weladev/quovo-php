<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

class UserAccount extends QuovoAbstract
{
    protected $app;

    protected $client;

    const PATH = 'users/%d/accounts';

    public function __construct(QuovoApp $app, QuovoClient $client)
    {
        $this->app = $app;
        $this->client = $client;
    }

    public function create($userId, array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->post(
            $this->app,
            $this->client,
            sprintf(self::PATH, $userId),
            $options
        );
    }

    public function all($userId)
    {
        return $this->get(
            $this->app,
            $this->client,
            sprintf(self::PATH, $userId)
        );
    }
}