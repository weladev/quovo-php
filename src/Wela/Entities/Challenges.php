<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Challenges
 *
 * @package Wela\Entities
 */
class Challenges extends QuovoAbstract
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
    const PATH = 'challenges';

    /**
     * Challenges constructor.
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
     * Get MFA Challenges.
     *
     * Retrieves any Challenges associated with an Account.
     *
     * @param int $accountId The Quovo Account Id.
     * @return object
     */
    public function getMFA($accountId)
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
     * Answer an MFA Challenge.
     *
     * Answer available MFA Challenges for an Account.
     *
     * You may provide either a question and an answer, or a JSON array containing
     * multiple question and answer objects (in the field questions).
     *
     * Requests with all three parameters will ignore the questions parameter.
     *
     * @param int   $accountId
     * @param array $challenges
     *
     * @return mixed
     */
    public function sendResponse($accountId, array $challenges)
    {
        $challenges['account'] = $accountId;

        $options = [
            'json' => $challenges
        ];

        return $this->put(
            $this->app,
            $this->client,
            self::PATH,
            $options
        );
    }
}