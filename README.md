#LeaderSSL API Client

This package introduces APIv1 for [Leader SSL](https://api.leaderssl.com/) services using PHP 7.x. version will follow shortly.


#Installation

`composer require fozzyhosting/leaderssl-api-client`

#Init

```php
<?php

use Fozzy\LeaderSSL\Api\Clients;

//Login to leader ssl
$client = Clients::make('login', 'password');
```

#Get products LeaderSSl

```php
    //Get all products
    /**
    * @params bool $ssl, float $price
     */
   $client->products()->list();
```

#Orders
Query create preorder example
```
[
'nomenclature_id' => 200,
'days' => 365,
'domain_name' => 'exapmle.com,
'standard_domains_count' => 1,
'wildcard_domains_count' => 1,
];
```

```php
    /**
     * Create preorder
     *
     * @param array $query
     */
    $client->orders()->prerorder();

    /**
    * Get preorders list
    */
    $client->orders()->getPreorders();

    /**
    * Get preorder By Id
    *
    * @params int $preorderId
    */
    $client->orders()->getPreorderById('preorderId');

    /**
    * Get preorder Issue By Id
    *
    * @params int $preorderId
    */
    $client->orders()->getPreorderIssue('preorderId');

```

#Create new Order/Cert
```php
   /**
   * Create new Cert
   *
   * @param array $query
   */
   $client->orders()->new($query);
```
Query create new Cert example
```
"order":{
   "first_name": null,
   "last_name": null,
   "phone": null,
   "email": null,
   "title": null,
   "fax": null,
   "company": null,
   "address_1": null,
   "city_name": null,
   "region_name": null,
   "zip_code": null,
   "country_id": null,
   "items":[
       {
            "nomenclature_id":296,
            "days":365,
            "ssl_server_software_id":37,
            "dcv_type": "EMAIL",
            "dcv_email": "test@test.com",
            "domain_name": "test.com",
            "csr": "csr",
            "country_name": "RU",
            "region_name": "Test region",
            "city_name": "Test city",
            "organization_name": "Test Ltd.",
            "organizational_unit": "IT Department",
            "zip_code": "12345",
            "address_1": "Address Line 1",
            "address_2": "Address Line 2",
            "additional_domains": "example.com,example2.com",
            "additional_validation_emails": {
            "example.com":"test@example.com",
            "example2.com":"test@example2.com"
       },
       "unique_value":"dY4bMq2f"
   ]
}

* “dcv_type”: string. Type of Domain Control Validation. Valid values are “EMAIL”, “CNAME_CSR_HASH”, “HTTP_CSR_HASH”, or “HTTPS_CSR_HASH”
  * EMAIL — email with validation code to specific email address
  * CNAME_CSR_HASH — certain DNS record should be created
  * HTTP_CSR_HASH — Plain text file with specific name and content should be placed to the root of web server and accessible via HTTP protocol.
  * HTTPS_CSR_HASH — Plain text file with specific name and content should be placed to the root of web server and accessible via HTTPS protocol.

* “unique_value”: string (20 chars max, latin letters and numbers allowed) This unique_value is incorporated into the Request Token used with the HTTP_CSR_HASH, HTTPS_CSR_HASH, and CNAME_CSR_HASH dcvMethods
```
#DCV

```php
    /**
     * Get dcv emails
     *
     * @param string $domain
     */
     $client->dcv()->emails('domain');

     /**
     * Get dcv issues Status
     *
     * @param int $certificateId
     */
    $client->dcv()->status('certificateId');

    /**
     * Change DCV method and resend validation email.
     *
     * @param int $certificateId
     * @param string $dcvMethod
    */
    $client->dcv()->change('certificateId', 'dcvMethod');

    /**
     * Resend validation email
     *
     * @param int $certificateId
    */
    $client->dcv()->reSend('certificateId');
```

#Certificates

```php
    /**
     * Get all ssl certificate
    */
    $client->certificates()->list();

    /**
    * Download Certificate by id
    *
    * @params int $certificationId
    */
    $client->certificates()->download('certificationId');

    /**
     * Get Certificate status by id
     *
     * @param int $certificateId
    */
    $client->certificates()->status('certificationId');
```
