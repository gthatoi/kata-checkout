<?php

namespace App\Models\Pricing;

class Checkout
{
    public function __construct(private readonly array $pricingFormulae, private array $scannedSkus = []) {}

    public function scan(string $sku): void
    {
        $this->scannedSkus[] = $sku;
    }

    public function total(): int
    {
        $skusWithQuantity = array_count_values($this->scannedSkus);
        $totalPrice = 0;

        foreach ($skusWithQuantity as $sku => $quantity) {
            if (!isset($this->pricingFormulae[$sku])) {
                continue;
            }

            /** @var $pricingConfiguration PricingInterface */
            $pricingConfiguration = $this->pricingFormulae[$sku];
            $totalPrice += $pricingConfiguration->calculatePrice($quantity);
        }

        return $totalPrice;
    }
}
