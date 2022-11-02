<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

use Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient;

class Entity
{
    /**
     * HTTP Client which using for API requests
     *
     * @var \Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient
     */
    protected $httpClient;

    /**
     * Object constructor
     *
     * @param HttpClient $httpClient
     *
     * @return void
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Return HTTP Client
     *
     * @return \Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient|null
     */
    public function getHttpClient(): ?HttpClient
    {
        return $this->httpClient;
    }
}
