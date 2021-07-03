<?php

namespace App\Exception;

use JetBrains\PhpStorm\Pure;
use RuntimeException;

class ApiRequestException extends RuntimeException
{
    private const CODE = 2900;

    #[Pure]
    public function __construct(string $message)
    {
        parent::__construct($message, self::CODE);
    }
}
