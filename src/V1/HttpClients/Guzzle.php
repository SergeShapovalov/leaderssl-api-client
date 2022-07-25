<?php

namespace Fozzy\LeaderSSL\Api\V1\HttpClients;

use Fozzy\LeaderSSL\Api\Exception\InvalidRequest;
use GuzzleHttp\Client;
use Fozzy\LeaderSSL\Api\Exception\InvalidAuthClient;

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
    private $publicToken;

    /**
     * Guzzle client
     */
    public $client;

    /**
     * @param string $login
     * @param string $password
     * @param string $apiUrl
     * @param callable|null $handler
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function __construct(string $login, string $password, string $apiUrl, callable $handler = null)
    {
        parent::__construct($login, $password, $apiUrl);

        $config = [
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Content-Type' => 'json'
            ]
        ];

        if ($handler) {
            $config['handler'] = $handler;
        }

        $this->client = new Client($config);
        $auth = $this->init($login, $password);

        $this->authToken = $auth['auth_token'];
        $this->publicToken = $auth['public_token'];
    }

    /**
     * Init Leader ssl User
     *
     * @return mixed
     */
    private function init($login, $password)
    {
        $query = [
            'login' => $login,
            'password' => $password,
        ];

        return $this->request('users/signin', 'POST', $query);
    }

    public function request(string $resource = '', string $methods = 'GET', array $queryParams = [], array $header = [])
    {
        $options = [];

        if (!empty($header)) {
            $options['headers'] = $header;
        }

        if (!empty($queryParams)) {
            $options['query'] = $queryParams;
        }

        if ($this->authToken) {
                $options['query']['auth_token'] = $this->authToken;
        }

        try {
            $response = $this->client->request($methods, $resource, $options);
        } catch (\Exception $e) {
            switch ($e->getCode())
            {
                case 401 :
                    throw new InvalidAuthClient;
                case 500 :
                    throw new InvalidRequest;
                default :
                    return $e->getMessage();
            }
        }

        $content = $response->getBody()->getContents();
        $result = json_decode($content, true);

        if (!is_null($result) && isset($result['error'])) {
            return $result;
        }

        return $result;
    }

}
