<?php

namespace OkDesk\API;


use GuzzleHttp\Client;

class Api
{
    protected $token;
    protected $client;
    protected $issues;

    public function __construct($account, $token)
    {
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => 'https://' . $account . '.okdesk.ru/api/v1/'
        ]);
    }

    public function issues()
    {
        if (is_null($this->issues)) {
            $this->issues = new Issues($this);
        }
        return $this->issues;
    }

    public function requestGet($resource, $params = [])
    {
        $params['api_token'] = $this->token;
        return $this->client->get($resource, ['query' => $params]);
    }

    public function requestPost($resource, $params = [])
    {
        return $this->client->post($resource, [
            'query' => ['api_token' => $this->token],
            'json' => $params,
        ]);
    }
}