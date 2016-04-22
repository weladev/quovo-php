<?php

namespace Wela;

abstract class QuovoAbstract
{
    public function get(QuovoApp $app, QuovoClient $qClient, $path, $options = [])
    {
        $client = $qClient->getClient();
        $token = $app->getAccessToken()->getValue();

        $defaultOptions = [
            'headers' => [
                'Authorization' => 'Bearer ' . $token->access_token->token
            ]
        ];

        $response = $client->request('GET', $path, array_merge($defaultOptions, $options));

        return json_decode($response->getBody()->getContents());
    }
}