<?php

namespace Fozzy\LeaderSSL\Api\V1\HttpClients;

use Fozzy\LeaderSSL\Api\Exception\InvalidAuthClient;
use Fozzy\LeaderSSL\Api\Exception\InvalidRequest;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;

class Guzzle extends HttpClient
{
    /**
     * Leader SSL Auth Token
     *
     * @var string
     */
    private $authToken;

    /**
     * Leader SSL Public Token
     *
     * @var string
     */
    public $publicToken;

    /**
     * Guzzle client
     *
     * @var \GuzzleHttp\Client
     */
    public $client;

    /**
     * Object constructor
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @param string $login
     * @param string $password
     * @param string $apiUrl
     * @param callable|null $handler
     *
     * @return void
     */
    public function __construct(string $login, string $password, string $apiUrl, callable $handler = null)
    {
        parent::__construct($login, $password, $apiUrl);

        $config = [
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Content-Type' => 'json',
            ],
        ];

        if ($handler) {
            $config['handler'] = $handler;
        }

        $this->client = new Client($config);
        $auth = $this->init($login, $password);

        if (isset($auth['auth_token'])) {
            $this->authToken = $auth['auth_token'];
        }

        if (isset($auth['public_token'])) {
            $this->publicToken = $auth['public_token'];
        }
    }

    /**
     * Init Leader SSL User
     *
     * @param string $login
     * @param string $password
     *
     * @return mixed
     */
    private function init(string $login, string $password)
    {
        $query = [
            'login' => $login,
            'password' => $password,
        ];

        return $this->request('users/signin', 'POST', ['query' => $query]);
    }

    /**
     * Make API request
     *
     * @param string $resource
     * @param string $method
     * @param array $options
     *
     * @return mixed
     */
    public function request(string $resource, string $method = 'GET', array $options = [])
    {
        if (!empty($this->authToken)) {
            $options['query']['auth_token'] = $this->authToken;
        }

        try {
            $response = $this->client->request($method, $resource, $options);
            $contents = $response->getBody()->getContents();
        } catch (BadResponseException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
        }

        $result = json_decode($contents, true);

        return $result === null ? $contents : $result;
    }
}
