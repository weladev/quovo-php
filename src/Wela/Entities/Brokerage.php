<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Brokerage
 *
 * @package Wela\Entities
 */
class Brokerage extends QuovoAbstract
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
    const PATH = 'brokerages';

    /**
     * Brokerage constructor.
     * @param QuovoApp $app
     * @param QuovoClient $client
     */
    public function __construct(QuovoApp $app, QuovoClient $client)
    {
        $this->app = $app;
        $this->client = $client;
    }

    /**
     * Fetch all available Brokerages
     * Provides information on all of Quovo’s supported Brokerages.
     *
     * @return array
     */
    public function all()
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH
        );
    }

    /**
     * Get a single Brokerage
     * Provides information on a single Quovo-supported Brokerage.
     *
     * @param int $id The Quovo Brokerage id.
     *
     * @return object
     */
    public function find($id)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $id
        );
    }
}