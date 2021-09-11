<?php

declare(strict_types=1);

namespace Acme\Exception;

use RuntimeException;

final class InvalidCode extends RuntimeException
{
    public static function emptyValue(): self
    {
        return new self('Product code cannot be empty');
    }
}
