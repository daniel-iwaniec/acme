<?php

declare(strict_types=1);

namespace Acme\Service;

use Acme\Collection\Products;
use Acme\Value\Money;

final class RegularOfferCalculator implements OfferCalculator
{
    public function calculate(Products $products): Money
    {
        $total = new Money();
        foreach ($products as $product) {
            $total = $total->add($product->getPrice());
        }

        return $total;
    }
}
