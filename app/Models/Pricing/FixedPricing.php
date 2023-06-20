<?php

namespace App\Models\Pricing;

readonly class FixedPricing implements PricingInterface
{
    public function __construct(private int $price) {}

    public function calculatePrice(int $quantity): int
    {
        return $quantity * $this->price;
    }
}
