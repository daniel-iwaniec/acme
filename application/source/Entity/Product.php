<?php

declare(strict_types=1);

namespace Acme\Entity;

use Acme\Value\Money;
use Acme\Value\ProductCode;

final class Product
{
    public function __construct(
        private string $name,
        private ProductCode $code,
        private Money $price
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function hasCode(ProductCode $productCode): bool
    {
        return $this->code->equals($productCode);
    }

    public function __toString(): string
    {
        return (string) $this->code;
    }
}
