<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Sync
 *
 * @package Wela\Entities
 */
class Sync extends QuovoAbstract
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
    const PATH = 'sync';

    /**
     * Sync constructor.
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
     * Get Sync progress
     *
     * Check the ongoing sync progress of an Account.
     *
     * @param int $accountId
     *
     * @return mixed
     */
    public function getSyncStatus($accountId)
    {
        $options = [
            'query' => [
                'account' => $accountId
            ]
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }

    /**
     * Create Sync
     *
     * Creates and initiates a new account sync.
     *
     * @param int $accountId
     *
     * @return mixed
     */
    public function sync($accountId)
    {
        $options = [
            'json' => [
                'account' => $accountId
            ]
        ];

        return $this->post(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }
}