<?php

declare(strict_types=1);

namespace Acme\Repository;

use Acme\Entity\Product;
use Acme\Exception\InvalidData;
use Acme\Value\ProductCode;

interface ProductCatalog
{
    /**
     * @throws InvalidData
     */
    public function getProduct(ProductCode $code): Product;
}
