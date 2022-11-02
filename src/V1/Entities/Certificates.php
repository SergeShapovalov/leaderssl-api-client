<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

use GuzzleHttp\Psr7\Utils;

class Certificates extends Entity
{
    /**
     * Get Certificate status by ID
     *
     * @param int $certificateId
     *
     * @return mixed
     */
    public function status(int $certificateId)
    {
        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/status");
    }

    /**
     * Download Certificate by ID
     *
     * @param int $certificateId
     * @param string $filePath
     *
     * @return mixed
     */
    public function download(int $certificateId, string $filePath)
    {
        $resource = Utils::tryFopen($filePath, 'w');
        $options = ['sink' => $resource];

        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/download", 'GET', $options);
    }

    /**
     * Get all SSL certificates
     *
     * @return mixed
     */
    public function list()
    {
        return $this->getHttpClient()->request('ssl_certificates');
    }
}
