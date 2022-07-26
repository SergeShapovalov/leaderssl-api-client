<?php

namespace Fozzy\LeaderSSL\Api\Exception;

use Exception;

class InvalidApiVersion extends Exception
{
    protected $message = 'Client for the specified API version does not exist';
}
