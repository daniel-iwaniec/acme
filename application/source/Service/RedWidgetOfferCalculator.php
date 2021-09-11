<?php

declare(strict_types=1);

namespace Acme\Service;

use Acme\Collection\Products;
use Acme\Value\Money;
use Acme\Value\ProductCode;

final class RedWidgetOfferCalculator implements OfferCalculator
{
    public function calculate(Products $products): Money
    {
        $widgetCount = 0;
        $total = new Money();

        foreach ($products as $product) {
            $total = $total->add($product->getPrice());

            if ($product->hasCode(ProductCode::WidgetR01()) && (++$widgetCount % 2) === 0) {
                $total = $total->subtract($product->getPrice()->half());
            }
        }

        return $total;
    }
}
