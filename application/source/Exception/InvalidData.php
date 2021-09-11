<?php

declare(strict_types=1);

namespace Acme\Exception;

use Acme\Value\ProductCode;
use RuntimeException;

final class InvalidData extends RuntimeException
{
    public static function nonExistentProduct(ProductCode $code): self
    {
        return new self(sprintf('Product with code %s does not exist', (string) $code));
    }
}
