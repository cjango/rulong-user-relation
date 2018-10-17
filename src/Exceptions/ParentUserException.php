<?php

namespace RuLong\UserAccount\Exceptions;

use RuntimeException;

class ParentUserException extends RuntimeException
{

    public function __construct($message)
    {
        parent::__construct($message);
    }
}
