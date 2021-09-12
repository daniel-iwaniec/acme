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
        $this->products->add(product: $this->productCatalog->getProduct($code));
    }

    public function calculateTotal(): Money
    {
        $totals = [];
        foreach ($this->offers as $offer) {
            $totals[] = $offer->calculate($this->products);
        }

        $total = min($totals);
        if ($total === false) {
            $total = new Money();
        }

        $deliveryCost = $this->delivery->calculate($total);

        return $total->add($deliveryCost);
    }
}
