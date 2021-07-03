<?php

namespace App\Exception;

use JetBrains\PhpStorm\Pure;
use RuntimeException;

class UnexpectedTypeException extends RuntimeException
{
    private const CODE = 2800;

    #[Pure]
    public function __construct(string $message)
    {
        parent::__construct($message, self::CODE);
    }
}
