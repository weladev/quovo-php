<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class TermsOfUse
 *
 * @package Wela\Entities
 */
class TermsOfUse extends QuovoAbstract
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
    const PATH = 'terms_of_use';

    /**
     * TermsOfUse constructor.
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
     * Check ToU Acceptance
     *
     * Check whether or not a User has accepted Quovo’s terms of use.
     *
     * @param int $userId
     *
     * @return mixed
     */
    public function checkAcceptance($userId)
    {
        $options = [
            'query' => [
                'user' => $userId
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
     * Update ToU Acceptance
     *
     * Update whether or not a User has accepted Quovo’s terms of use.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function update(array $params)
    {
        $options = [
            'json' => $params
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }
}