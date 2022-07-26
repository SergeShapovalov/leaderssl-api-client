<?php

namespace Fozzy\LeaderSSL\Api\V1\HttpClients;

class HttpClient
{
    /**
     * User Email
     *
     * @var string
     */
    public $login;

    /**
     * User Password
     *
     * @var string
     */
    public $password;

    /**
     * API Url
     *
     * @var string
     */
    public $apiUrl;

    public function __construct(string $login, string $password, string $apiUrl)
    {
        $this->login = $login;
        $this->password = $password;
        $this->apiUrl = $apiUrl;
    }
}
