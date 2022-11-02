<?php

namespace Fozzy\LeaderSSL\Api;

use Fozzy\LeaderSSL\Api\Exception\InvalidApiVersion;
use Fozzy\LeaderSSL\Api\Exception\InvalidHttpClient;

class Clients
{
    /**
     * Make API request
     *
     * @throws \Fozzy\LeaderSSL\Api\Exception\InvalidApiVersion
     * @throws \Fozzy\LeaderSSL\Api\Exception\InvalidHttpClient
     *
     * @param string $login
     * @param string $password
     * @param string $password
     * @param string $apiUrl
     * @param string $apiVersion
     * @param string $httpClient
     *
     * @return mixed
     */
    public static function make(string $login, string $password, string $apiUrl = '', string $apiVersion = 'v1', string $httpClient = 'guzzle')
    {
        $clientClassName = __NAMESPACE__ . '\\' . ucfirst($apiVersion) . '\\Clients';

        if (!class_exists($clientClassName)) {
            throw new InvalidApiVersion;
        }

        $httpClientClassName = __NAMESPACE__ . '\\' . ucfirst($apiVersion) . '\\HttpClients\\' . ucfirst($httpClient);

        if (!class_exists($httpClientClassName)) {
            throw new InvalidHttpClient;
        }

        $apiUrl = empty($apiUrl) ? $clientClassName::DEFAULT_API_URL : $apiUrl;
        $httpClient = new $httpClientClassName($login, $password, $apiUrl);

        return new $clientClassName($httpClient);
    }
}
