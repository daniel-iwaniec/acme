<?php

declare(strict_types=1);

namespace Acme\Repository;

use Acme\Entity\Product;
use Acme\Exception\InvalidData;
use Acme\Value\Money;
use Acme\Value\ProductCode;

final class MemoryProductCatalog implements ProductCatalog
{
    /** @var array<string, Product> */
    private array $data;

    public function __construct()
    {
        $this->data = [
            'R01' => new Product('Red Widget', new ProductCode('R01'), new Money('32.95')),
            'G01' => new Product('Green Widget', new ProductCode('G01'), new Money('24.95')),
            'B01' => new Product('Blue Widget', new ProductCode('B01'), new Money('7.95'))
        ];
    }

    /**
     * @throws InvalidData
     */
    public function getProduct(ProductCode $code): Product
    {
        $product = $this->data[(string) $code] ?? null;
        if (!$product) {
            throw InvalidData::nonExistentProduct($code);
        }

        return $product;
    }
}
