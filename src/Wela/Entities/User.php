<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class User
 *
 * @package Wela\Entities
 */
class User extends QuovoAbstract
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
    const PATH = 'users';

    /**
     * User constructor.
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
     * Get all Users
     *
     * Fetches all of your Users.
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

    /**
     * Create a User
     *
     * Creates a Quovo User.
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
     * Get User
     *
     * Provides information on a single User.
     *
     * @param int $userId
     *
     * @return mixed
     */
    public function find($userId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId
        );
    }

    /**
     * Modify an existing User
     *
     * Modifies an existing user.
     *
     * @param int   $userId
     * @param array $params
     *
     * @return mixed
     */
    public function modify($userId, array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId,
            $options
        );
    }

    /**
     * Delete a User
     *
     * Deletes a Quovo User.
     *
     * @param $userId
     */
    public function deleteUser($userId)
    {
        $this->delete(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId
        );
    }

    /**
     * Accounts
     *
     * @return UserAccount
     */
    public function account()
    {
        return new UserAccount($this->app, $this->client);
    }

    /**
     * Get Transactions
     *
     * Fetches all of a User’s transactions, across all of their Portfolios.
     *
     * @param int   $userId
     * @param array $params
     *
     * @return mixed
     */
    public function transactions($userId, array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/history',
            $options
        );
    }

    /**
     * Create an iframe token
     *
     * Use this endpoint to create a single-use iframe-access token for a User.
     * This gives an end user access to their iframe widget and all of their
     * associated Accounts.
     *
     * @param int $userId
     *
     * @return mixed
     */
    public function iframe($userId)
    {
        return $this->post(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/iframe_token'
        );
    }

    /**
     * Get Portfolios
     *
     * Returns all of a User’s Portfolios, across all of their Accounts.
     *
     * @param int $userId
     *
     * @return mixed
     */
    public function portfolios($userId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/portfolios'
        );
    }

    /**
     * Get Positions
     *
     * Fetches all of a User’s Positions, across all of their Portfolios.
     *
     * @param int   $userId
     * @param array $params
     *
     * @return mixed
     */
    public function positions($userId, array $params = [])
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/positions',
            $options
        );
    }

    /**
     * Request a Brokerage
     *
     * Requests a new financial institution for Quovo to retrieve data from.
     *
     * @param int   $userId
     * @param array $params
     *
     * @return mixed
     */
    public function requestBrokerage($userId, array $params)
    {
        $options = [
            'query' => $params
        ];

        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/requests',
            $options
        );
    }

    /**
     * Check ToU Acceptance
     *
     * Check whether or not a User has accepted Quovo’s Terms of Use.
     *
     * @param $userId
     *
     * @return mixed
     */
    public function checkToUAcceptance($userId)
    {
        return $this->get(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/terms_of_use'
        );
    }

    /**
     * Update User ToU
     *
     * Update whether or not a User has accepted Quovo’s Terms of Use.
     *
     * @param int   $userId
     * @param bool  $accepted
     *
     * @return mixed
     */
    public function updateToU($userId, $accepted)
    {
        $options = [
            'json' => [
                'accepted' => $accepted
            ]
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH . '/' . $userId . '/terms_of_use',
            $options
        );
    }
}