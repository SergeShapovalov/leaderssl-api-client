<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class Orders extends Entity
{

    /**
     * Create preorder
     *
     * @param array $query
     * @return mixed
     */
    public function preorder(array $query)
    {
        return $this->getHttpClient()->request('preorder', 'POST', $query);
    }

    /**
     * Get preorder
     *
     * @param array $query
     * @return mixed
     */
    public function getPreorders(array $query = [])
    {
        return $this->getHttpClient()->request('preorders', 'POST', $query);
    }

    /**
     * Get preorder By Id
     *
     * @param int $orderId
     * @return mixed
     */
    public function getPreorderById(int $orderId)
    {
        return $this->getHttpClient()->request("preorders/{$orderId}");
    }

    /**
     * Get preorder Issue byId
     *
     * @param int $orderId
     * @return mixed
     */
    public function getPreorderIssue(int $orderId)
    {
        return $this->getHttpClient()->request("preorders/{$orderId}/issue");
    }

    /**
     * Create new Order/Cert
     *
     * @param array $query
     * @return mixed
     */
    public function new(array $query)
    {
        return $this->getHttpClient()->request('order', 'POST', $query);
    }

}
