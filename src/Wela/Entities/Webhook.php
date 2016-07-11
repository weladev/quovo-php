<?php

namespace Wela\Entities;

use Wela\QuovoAbstract;
use Wela\QuovoApp;
use Wela\QuovoClient;

/**
 * Class Webhook
 *
 * @package Wela\Entities
 */
class Webhook extends QuovoAbstract
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
    const PATH = 'webhooks';

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
     * Get all Webhook​s
     *
     * Retrieve your registered webhooks. Note: secret is intentionally omitted
     * from all GET requests. It is only returned after being updated or after
     * a new webhook is created.
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
     * Register a New Webhook​
     *
     * Used to register new webhooks.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function register(array $params)
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
     * Modify a Webhook
     *
     * Used to update an existing webhook.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function modify(array $params)
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

    /**
     * Delete a Webhook
     *
     * Deletes an existing webhook.
     *
     * @param $webhookName
     */
    public function deleteWebhook($webhookName)
    {
        $options = [
            'json' => [
                'name' => $webhookName
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