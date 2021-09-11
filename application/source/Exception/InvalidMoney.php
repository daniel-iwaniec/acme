<?php

declare(strict_types=1);

namespace Acme\Exception;

use RuntimeException;

final class InvalidMoney extends RuntimeException
{
    public static function negativeValue(string $amount): self
    {
        return new self(sprintf('Money amount %s is negative', $amount));
    }
}
