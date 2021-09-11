<?php

declare(strict_types=1);

namespace Acme\Entity;

use Acme\Collection\OfferCalculators;
use Acme\Collection\Products;
use Acme\Repository\ProductCatalog;
use Acme\Service\DeliveryCalculator;
use Acme\Value\Money;
use Acme\Value\ProductCode;

final class Basket
{
    private Products $products;

    public function __construct(
        private ProductCatalog $productCatalog,
        private OfferCalculators $offers,
        private DeliveryCalculator $delivery,
    ) {
        $this->products = new Products();
    }

    public function add(ProductCode $code): void
    {
        $this->products->add($this->productCatalog->getProduct($code));
    }

    public function calculateTotal(): Money
    {
        $total = new Money('0', isNull: true);

        foreach ($this->offers as $offer) {
            $offerTotal = $offer->calculate($this->products);
            if ($offerTotal->isLess($total) || $total->isNull()) {
                $total = $offerTotal;
            }
        }

        $deliveryCost = $this->delivery->calculate($total);

        return $total->add($deliveryCost);
    }
}
