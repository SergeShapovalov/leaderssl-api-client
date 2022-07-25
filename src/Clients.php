<?php

namespace Fozzy\LeaderSSL\Api;
use Fozzy\LeaderSSL\Api\Exception\InvalidApiVersion;
use Fozzy\LeaderSSL\Api\Exception\InvalidHttpClient;


class Clients
{
    public static function make(string $login, string $password, string $apiUrl = null, string $apiVersion = 'v1', string $httpClient = 'guzzle')
    {
        $clientClassname = __NAMESPACE__ . '\\' . ucfirst($apiVersion) . '\\Clients';
        if (!class_exists($clientClassname)) {
            throw new InvalidApiVersion;
        }

        $httpClientClassname = __NAMESPACE__ . '\\' . ucfirst($apiVersion) . '\\HttpClients\\' . ucfirst($httpClient);
        if (!class_exists($httpClientClassname)) {
            throw new InvalidHttpClient;
        }
        $apiUrl = empty($apiUrl) ? $clientClassname::DEFAULT_API_URL : $apiUrl;
        $httpClient = new $httpClientClassname($login, $password, $apiUrl);

        return new $clientClassname($httpClient);
    }
}
