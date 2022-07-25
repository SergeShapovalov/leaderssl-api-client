<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class Products extends Entity
{
    /**
     * Products list and price
     *
     * @param bool $ssl
     * @param float $recommendPrices
     * @param array $header
     * @return mixed
     */
    public function list(bool $ssl, float $recommendPrices, array $header = [])
    {
        $queryParams = [];

        if (!empty($recommendPrices)) {
            $queryParams = [
                'ssl' => $ssl,
                'recommendedPrice' => $recommendPrices,
            ];
        }

        return $this->httpClient->request('products', 'GET', $queryParams, $header);
    }
}
