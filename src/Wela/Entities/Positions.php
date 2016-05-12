<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Positions
 *
 * @package Wela\Entities
 */
class Positions extends QuovoAbstract
{
    /**
     * @var QuovoApp The Quovo app entity.
     */
    protected $app;

    /**
     * @var QuovoClient The Guzzle service.
     */
    protected $client;

    /**
     * @const string The uri used for this entity.
     */
    const PATH = 'positions';

    /**
     * Positions constructor.
     *
     * @param QuovoApp $app
     * @param QuovoClient $client
     */
    public function __construct(QuovoApp $app, QuovoClient $client)
    {
        $this->app = $app;
        $this->client = $client;
    }

    /**
     * Get all Positions
     *
     * Fetches on all Positions across all Portfolios and Accounts.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function all(array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }
}