<?php

declare(strict_types=1);

namespace Acme\Collection;

use Acme\Service\OfferCalculator;
use ArrayIterator;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, OfferCalculator>
 */
final class OfferCalculators implements IteratorAggregate
{
    /** @var array<int, OfferCalculator> */
    private array $collection = [];

    public function add(OfferCalculator $offerCalculator): void
    {
        $this->collection[] = $offerCalculator;
    }

    /**
     * @return ArrayIterator<int, OfferCalculator>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->collection);
    }
}
