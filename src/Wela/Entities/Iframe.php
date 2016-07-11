<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Iframe
 *
 * @package Wela\Entities
 */
class Iframe extends QuovoAbstract
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
    const PATH = 'iframe_token';

    /**
     * Iframe constructor.
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
     * Creating an iframe token
     *
     * Use this endpoint to create a single-use iframe-access token for a User.
     * This token will provide a User access to their iframe widget and all of
     * their associated Accounts.
     *
     * @param int $userId
     *
     * @return mixed
     */
    public function getIframeToken($userId)
    {
        $options = [
            'json' => [
                'user' => $userId
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