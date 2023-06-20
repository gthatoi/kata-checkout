<?php

namespace App\Models\Pricing;

readonly class SpecialPricing implements PricingInterface
{
    public function __construct(
        private int $specialQuantity,
        private int $specialPrice,
        private int $unitPrice
    ) {}

    public function calculatePrice(int $quantity): int
    {
        $specialBundle = (int) ($quantity / $this->specialQuantity);
        $qualifiedForFixedPrice = $quantity % $this->specialQuantity;

        return ($specialBundle * $this->specialPrice) + ($qualifiedForFixedPrice * $this->unitPrice);
    }
}
