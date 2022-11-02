<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class Products extends Entity
{
    /**
     * Products list and price
     *
     * @param bool $ssl
     * @param float $recommendPrices
     * @param string[] $headers
     *
     * @return mixed
     */
    public function list(bool $ssl, float $recommendPrices, array $headers = [])
    {
        $queryParams = [];

        if (!empty($recommendPrices)) {
            $queryParams = [
                'ssl' => $ssl,
                'recommendedPrice' => $recommendPrices,
            ];
        }

        return $this->getHttpClient()->request('products', 'GET', ['query' => $queryParams, 'headers' => $headers]);
    }
}
