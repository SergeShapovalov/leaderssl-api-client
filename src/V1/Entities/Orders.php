<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class Orders extends Entity
{
    /**
     * Create preorder
     *
     * @param mixed[] $data
     *
     * @return mixed
     */
    public function preorder(array $data)
    {
        return $this->getHttpClient()->request('preorder', 'POST', ['query' => $data]);
    }

    /**
     * Get preorder
     *
     * @param mixed[] $data
     *
     * @return mixed
     */
    public function getPreorders(array $data = [])
    {
        return $this->getHttpClient()->request('preorders', 'POST', ['query' => $data]);
    }

    /**
     * Get preorder By Id
     *
     * @param int $orderId
     *
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
     *
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
     *
     * @return mixed
     */
    public function new(array $data)
    {
        return $this->getHttpClient()->request('order', 'POST', ['query' => $data]);
    }
}
