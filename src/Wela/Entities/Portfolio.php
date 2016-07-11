<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Portfolio
 *
 * @package Wela\Entities
 */
class Portfolio extends QuovoAbstract
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
    const PATH = 'portfolios';

    /**
     * Portfolio constructor.
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
     * Get all Portfolios
     *
     * Fetches all portfolios across all accounts and users.
     *
     * @return mixed
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
     * Get Portfolio
     *
     * Provides information on a single portfolio.
     *
     * @param int $portfolioId
     *
     * @return mixed
     */
    public function find($portfolioId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$portfolioId
        );
    }

    /**
     * Modify a portfolio
     *
     * Modifies an existing portfolio.
     *
     * @param int   $portfolioId
     * @param array $params
     *
     * @return mixed
     */
    public function modify($portfolioId, array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH.'/'.$portfolioId,
            $options
        );
    }

    /**
     * Get Transactions
     *
     * Fetch all of a portfolio’s transactions.
     *
     * @param int   $portfolioId
     * @param array $params
     *
     * @return mixed
     */
    public function transactions($portfolioId, array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$portfolioId.'/history',
            $options
        );
    }

    /**
     * Get Positions
     *
     * Fetch all of a portfolio’s positions.
     *
     * @param int   $portfolioId
     * @param array $params
     *
     * @return mixed
     */
    public function positions($portfolioId, array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$portfolioId.'/positions',
            $options
        );
    }
}