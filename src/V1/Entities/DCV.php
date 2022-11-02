<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class DCV extends Entity
{
    /**
     * Get DCV emails
     *
     * @param string $domain
     *
     * @return mixed
     */
    public function emails(string $domain)
    {
        $data = [
            'query' => [
                'domain_name' => $domain,
            ],
        ];

        return $this->getHttpClient()->request('dcv_emails', 'POST', $data);
    }

    /**
     * Get DCV issues Status
     *
     * @param int $certificateId
     *
     * @return mixed
     */
    public function status(int $certificateId)
    {
        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/dcv");
    }

    /**
     * Change DCV method and resend validation email.
     *
     * @param int $certificateId
     * @param string $dcvMethod
     *
     * @return mixed
     */
    public function change(int $certificateId, string $dcvMethod)
    {
        $data = [
            'query' => [
                'email' => $dcvMethod,
            ],
        ];

        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/change_dcv", 'POST', $data);
    }

    /**
     * Resend validation email
     *
     * @param int $certificateId
     *
     * @return mixed
     */
    public function resend(int $certificateId)
    {
        return $this->getHttpClient()->request("ssl_certificates/{$certificateId}/resend_dcv");
    }
}
