<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class History
 *
 * @package Wela\Entities
 */
class History extends QuovoAbstract
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
    const PATH = 'history';

    /**
     * History constructor.
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
     * Get all transactions
     *
     * Provides historical transactions across all of your users and their accounts.
     *
     * @param array $params The request params.
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

    /**
     * Update a transaction
     *
     * Update an existing historical transaction. Currently, only used to update a
     * transaction’s expense_category.
     *
     * @param int   $transactionId
     * @param array $params
     *
     * @return mixed
     */
    public function update($transactionId, array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH.'/'.$transactionId,
            $options
        );
    }
}