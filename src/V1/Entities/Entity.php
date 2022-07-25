<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

use Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient;

class Entity
{

    /**
     * HTTP Client which using for API requests
     */
    public $httpClient;

    public function __construct(HttpClient $httpClient) {
        $this->httpClient = $httpClient;
    }
}
