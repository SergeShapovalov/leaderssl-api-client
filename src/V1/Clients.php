<?php

namespace Fozzy\LeaderSSL\Api\V1;


use Fozzy\LeaderSSL\Api\V1\HttpClients\HttpClient;
use Fozzy\LeaderSSL\Api\V1\Entities\DCV;
use Fozzy\LeaderSSL\Api\V1\Entities\Orders;
use Fozzy\LeaderSSL\Api\V1\Entities\Balance;
use Fozzy\LeaderSSL\Api\V1\Entities\Products;
use Fozzy\LeaderSSL\Api\V1\Entities\Certificates;


class Clients
{
    /**
     * Default endpoint for API v1
     */
    const DEFAULT_API_URL = 'https://api.leaderssl.com/api/v1/';

    /**
     * @var Products
     */
    public $products;

    /**
     * @var Orders
     */
    public $orders;

    /**
     * @var Certificates
     */
    public $certificates;

    /**
     * @var DCV
     */
    public $dcv;

    /**
     * @var Balance
     */
    public $balance;


    /**
     * @var HttpClient
     */
    public $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return Products
     */
    public function products() : Products
    {
        if (!$this->products) {
            $this->products = new Products($this->httpClient);
        }
        return $this->products;
    }

    /**
     * @return Orders
     */
    public function orders() : Orders
    {
        if (!$this->orders) {
            $this->orders = new Orders($this->httpClient);
        }

        return $this->orders;
    }

    /**
     * @return DCV
     */
    public function dcv() : DCV
    {
        if (!$this->dcv) {
            $this->dcv = new DCV($this->httpClient);
        }

        return $this->dcv;
    }

    /**
     * @return Certificates
     */
    public function certificates() : Certificates
    {
        if (!$this->certificates) {
            $this->certificates = new Certificates($this->httpClient);
        }

        return $this->certificates;
    }
}
