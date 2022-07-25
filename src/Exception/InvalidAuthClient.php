<?php

namespace Fozzy\LeaderSSL\Api\Exception;
use Exception;

class InvalidAuthClient extends Exception
{
    protected $message = "Invalid login or password";
}
