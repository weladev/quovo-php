<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Token
 *
 * @package Wela\Entities
 */
class Token extends QuovoAbstract
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
    const PATH = 'tokens';

    /**
     * Token constructor.
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
     * Get all access tokens
     *
     * Retrieves all of your access tokens.
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
     * Create an access token
     *
     * Creates and returns an access token.
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
     * Delete Token
     *
     * Deletes an Authentication Token
     *
     * @param string $tokenName
     */
    public function deleteToken($tokenName)
    {
        $options = [
            'json' => [
                'name' => $tokenName
            ]
        ];

        $this->delete(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }
}