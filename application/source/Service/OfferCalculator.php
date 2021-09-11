<?php

declare(strict_types=1);

namespace Acme\Service;

use Acme\Collection\Products;
use Acme\Value\Money;

interface OfferCalculator
{
    public function calculate(Products $products): Money;
}
