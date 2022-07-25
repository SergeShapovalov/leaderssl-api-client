<?php

namespace Fozzy\LeaderSSL\Api\V1\Entities;

class DCV extends Entity
{

    /**
     * Get dcv emails
     *
     * @param string $domain
     * @return mixed
     */
    public function emails(string $domain)
    {
        return $this->httpClient->request('dcv_emails', 'POST', ['domain_name' => $domain]);
    }

    /**
     * Get dcv issues Status
     *
     * @param int $certificateId
     * @return mixed
     */
    public function status(int $certificateId)
    {
        return $this->httpClient->request("ssl_certificates/{$certificateId}/dcv");
    }

    /**
     * Change DCV method and resend validation email.
     *
     * @param int $certificateId
     * @param string $dcvMethod
     * @return mixed
     */
    public function change(int $certificateId, string $dcvMethod)
    {
        return $this->httpClient->request("ssl_certificates/{$certificateId}/change_dcv", "POST", ['email' => $dcvMethod]);
    }

    /**
     * Resend validation email
     *
     * @param int $certificateId
     * @return mixed
     */
    public function reSend(int $certificateId)
    {
        return $this->httpClient->request("ssl_certificates/{$certificateId}/resend_dcv");
    }

}
