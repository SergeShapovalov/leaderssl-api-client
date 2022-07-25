<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class Certificates extends Entity
{

    /**
     * Get Certificate status by id
     *
     * @param int $certificateId
     * @return mixed
     */
    public function status(int $certificateId)
    {
        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/status", "GET");
    }

    /**
     * Download Certificate by id
     *
     * @param int $certificateId
     * @return mixed
     */
    public function download(int $certificateId)
    {
        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/download", "GET");
    }

    /**
     * Get all ssl certificate
     *
     * @return mixed
     */
    public function list()
    {
        return $this->getHttpClient()->request('ssl_certificates');
    }

}
