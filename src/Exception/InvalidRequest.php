<?php

namespace Fozzy\LeaderSSL\Api\Exception;
use Exception;

class InvalidRequest extends Exception
{
    protected $message = "Invalid data on request";
}
