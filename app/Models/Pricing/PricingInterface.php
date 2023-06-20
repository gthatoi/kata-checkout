<?php

namespace App\Models\Pricing;

interface PricingInterface
{
    public function calculatePrice(int $quantity): int;
}
