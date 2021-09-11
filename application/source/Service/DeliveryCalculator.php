<?php

declare(strict_types=1);

namespace Acme\Service;

use Acme\Value\Money;

final class DeliveryCalculator
{
    public function calculate(Money $total): Money
    {
        if ($total->isLess(new Money('50.00'))) {
            return new Money('4.95');
        }

        if ($total->isLess(new Money('90.00'))) {
            return new Money('2.95');
        }

        return new Money('0.00');
    }
}
