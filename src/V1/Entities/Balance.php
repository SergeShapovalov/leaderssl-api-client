<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class Balance extends Entity
{
    /**
     * Get Account Balance
     *
     * @return mixed
     */
    public function get()
    {
        return $this->httpClient->request('billing/balance');
    }
}
