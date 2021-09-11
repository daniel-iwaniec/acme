<?php

declare(strict_types=1);

namespace Acme\Value;

use Acme\Exception\InvalidCode;

final class ProductCode
{
    /**
     * @throws InvalidCode
     */
    public function __construct(private string $code)
    {
        if ($code === '') {
            throw InvalidCode::emptyValue();
        }
    }

    public static function WidgetR01(): ProductCode
    {
        return new ProductCode('R01');
    }

    public function equals(ProductCode $code): bool
    {
        return $this->code === $code->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
