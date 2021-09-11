<?php

declare(strict_types=1);

namespace Acme\Test\Entity;

use Acme\Collection\OfferCalculators;
use Acme\Entity\Basket;
use Acme\Repository\MemoryProductCatalog;
use Acme\Service\DeliveryCalculator;
use Acme\Service\RedWidgetOfferCalculator;
use Acme\Service\RegularOfferCalculator;
use Acme\Value\ProductCode;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

final class BasketTest extends TestCase
{
    /**
     * @dataProvider basketConfigurations
     * @param array<int, string> $productCodes
     */
    public function testBasket(array $productCodes, string $total): void
    {
        $productCatalog = new MemoryProductCatalog();
        $offerCalculators = new OfferCalculators();
        $offerCalculators->add(new RegularOfferCalculator());
        $offerCalculators->add(new RedWidgetOfferCalculator());
        $deliveryCalculator = new DeliveryCalculator();
        $basket = new Basket($productCatalog, $offerCalculators, $deliveryCalculator);

        foreach ($productCodes as $productCode) {
            $basket->add(new ProductCode($productCode));
        }

        assertSame($total, (string) $basket->calculateTotal());
    }

    /**
     * @return array<int, array<int, array<int, string>|string>>
     */
    public function basketConfigurations(): array
    {
        return [
            [['B01', 'G01'], '37.85'],
            [['R01', 'R01'], '54.37'],
            [['R01', 'G01'], '60.85'],
            [['B01', 'B01', 'R01', 'R01', 'R01'], '98.27'],
        ];
    }
}
