<?php

declare(strict_types=1);

namespace Acme\Collection;

use Acme\Entity\Product;
use ArrayIterator;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, Product>
 */
final class Products implements IteratorAggregate
{
    /** @var array<int, Product> */
    private array $collection = [];

    public function add(Product $product): void
    {
        $this->collection[] = $product;
    }

    /**
     * @return ArrayIterator<int, Product>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->collection);
    }
}
