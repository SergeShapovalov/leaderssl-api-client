<?php

namespace Fozzy\LeaderSSL\Api\Exception;

use Exception;

class InvalidHttpClient extends Exception
{
    protected $message = 'Class for the specified HTTP Client does not exist';
}
