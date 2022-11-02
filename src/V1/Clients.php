<?php

namespace Fozzy\LeaderSSL\Api\V1;

use Fozzy\LeaderSSL\Api\V1\Entities\DCV;
use Fozzy\LeaderSSL\Api\V1\Entities\Orders;
use Fozzy\LeaderSSL\Api\V1\Entities\Balance;
use Fozzy\LeaderSSL\Api\V1\Entities\Products;
use Fozzy\LeaderSSL\Api\V1\Entities\Certificates;
use Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient;

class Clients
{
    /**
     * Default endpoint for API v1
     *
     * @var string
     */
    const DEFAULT_API_URL = 'https://api.leaderssl.com/api/v1/';

    /**
     * Products class
     *
     * @var \Fozzy\LeaderSSL\Api\V1\Entities\Products
     */
    public $products;

    /**
     * Orders class
     *
     * @var \Fozzy\LeaderSSL\Api\V1\Entities\Orders
     */
    public $orders;

    /**
     * Certificates class
     *
     * @var \Fozzy\LeaderSSL\Api\V1\Entities\Certificates
     */
    public $certificates;

    /**
     * DCV class
     *
     * @var \Fozzy\LeaderSSL\Api\V1\Entities\DCV
     */
    public $dcv;

    /**
     * Balance class
     *
     * @var \Fozzy\LeaderSSL\Api\V1\Entities\Balance
     */
    public $balance;

    /**
     * HTTP Client class
     *
     * @var \Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient
     */
    public $httpClient;

    /**
     * Public token after auth
     *
     * @var string
     */
    public $publicToken;

    /**
     * Object constructor
     *
     * @param HttpClient $httpClient
     * @return void
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Return public token
     *
     * @return string
     */
    public function getPublicToken(): string
    {
        if (!$this->publicToken) {
            $this->publicToken = $this->httpClient->publicToken;
        }

        return $this->publicToken;
    }

    /**
     * Return products object
     *
     * @return \Fozzy\LeaderSSL\Api\V1\Entities\Products
     */
    public function products(): Products
    {
        if (!$this->products) {
            $this->products = new Products($this->httpClient);
        }

        return $this->products;
    }

    /**
     * Return orders object
     *
     * @return \Fozzy\LeaderSSL\Api\V1\Entities\Orders
     */
    public function orders(): Orders
    {
        if (!$this->orders) {
            $this->orders = new Orders($this->httpClient);
        }

        return $this->orders;
    }

    /**
     * Return DCV object
     *
     * @return \Fozzy\LeaderSSL\Api\V1\Entities\DCV
     */
    public function dcv(): DCV
    {
        if (!$this->dcv) {
            $this->dcv = new DCV($this->httpClient);
        }

        return $this->dcv;
    }

    /**
     * Return certificates object
     *
     * @return \Fozzy\LeaderSSL\Api\V1\Entities\Certificates
     */
    public function certificates(): Certificates
    {
        if (!$this->certificates) {
            $this->certificates = new Certificates($this->httpClient);
        }

        return $this->certificates;
    }

    /**
     * Return balance object
     *
     * @return \Fozzy\LeaderSSL\Api\V1\Entities\Balance
     */
    public function balance(): Balance
    {
        if (!$this->balance) {
            $this->balance = new Balance($this->httpClient);
        }

        return $this->balance;
    }
}
