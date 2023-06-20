<?php

namespace App\Providers;

use App\Models\Pricing\Checkout;
use Illuminate\Support\ServiceProvider;
use App\Models\Pricing\FixedPricing;
use App\Models\Pricing\SpecialPricing;

class PricingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Checkout::class, function ($app) {
            $pricingRules = [
                'A' => new SpecialPricing(3, 130, 50),
                'B' => new SpecialPricing(2, 45, 30),
                'C' => new FixedPricing(20),
                'D' => new FixedPricing(15),
            ];

            return new Checkout($pricingRules);
        });
    }
}
