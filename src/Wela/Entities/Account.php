<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Account
 *
 * @package Wela\Entities
 */
class Account extends QuovoAbstract
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
    const PATH = 'accounts';

    /**
     * Account constructor.
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
     * Get all accounts
     *
     * Retrieves all Accounts across all Users.
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
     * Create an account
     *
     * Creates a new Quovo Account.
     *
     * @param array $params
     *
     * @return mixed
     */
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

    /**
     * Fetch a single Account
     *
     * Provides information on a specific Account
     *
     * @param int $accountId
     *
     * @return mixed
     */
    public function find($accountId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId
        );
    }

    /**
     * Modify an account
     *
     * Modifies an existing Account.
     *
     * @param int   $accountId
     * @param array $params
     *
     * @return mixed
     */
    public function modify($accountId, array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId,
            $options
        );
    }

    /**
     * Delete an Account
     *
     * Deletes an existing Quovo Account.
     *
     * @param int $accountId
     */
    public function deleteAccount($accountId)
    {
        $this->delete(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId
        );
    }

    /**
     * Get MFA Challenges
     *
     * Returns an account’s MFA Challenges, if any are available.
     *
     * @param int $accountId
     *
     * @return mixed
     */
    public function getMFA($accountId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/challenges'
        );
    }

    /**
     * Answer MFA Challenges
     *
     * Answer available MFA Challenges on an Account.
     *
     * You may provide either a question and an answer, or a JSON array
     * containing multiple question and answer objects (in the field questions).
     *
     * Requests with all 3 parameters will ignore the questions parameter.
     *
     * @param int   $accountId
     * @param array $params
     *
     * @return mixed
     */
    public function resolveMFA($accountId, array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/challenges',
            $options
        );
    }

    /**
     * Get Transactions
     *
     * Fetches all of an Account’s transactions, across all its Portfolios.
     *
     * @param int   $accountId
     * @param array $params
     *
     * @return mixed
     */
    public function transactions($accountId, array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/history',
            $options
        );
    }

    /**
     * Get Portfolios
     *
     * Provides information on all of an Account’s Portfolios.
     *
     * @param int $accountId
     *
     * @return mixed
     */
    public function portfolios($accountId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/portfolios'
        );
    }

    /**
     * Get Positions
     *
     * Retrieves Positions across all of an Account’s Portfolios.
     *
     * @param int   $accountId
     * @param array $params
     *
     * @return mixed
     */
    public function positions($accountId, array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/positions',
            $options
        );
    }

    /**
     * Check sync progress
     *
     * Check the sync progress of an Account.
     *
     * @param int $accountId
     *
     * @return mixed
     */
    public function getSyncStatus($accountId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/sync'
        );
    }

    /**
     * Start a new sync
     *
     * Initiates a new sync on the Account.
     *
     * @param $accountId
     *
     * @return mixed
     */
    public function sync($accountId)
    {
        return $this->post(
            $this->app,
            $this->client,
            self::PATH.'/'.$accountId.'/sync'
        );
    }
}