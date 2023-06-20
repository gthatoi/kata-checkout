<?php

namespace Tests;

use App\Models\Pricing\Checkout;
use App\Models\Pricing\FixedPricing;
use App\Models\Pricing\SpecialPricing;

class CheckoutTest extends TestCase
{
    public function testTotalAmountWithFixedPricing()
    {
        $pricingConfiguration = [
            'A' => new FixedPricing(50),
            'B' => new FixedPricing(30),
            'C' => new FixedPricing(20),
            'D' => new FixedPricing(15),
        ];

        $checkout = new Checkout($pricingConfiguration);

        $checkout->scan('A');
        $checkout->scan('B');
        $checkout->scan('B');
        $checkout->scan('C');
        $checkout->scan('D');

        $totalPrice = $checkout->total();

        $this->assertEquals(145, $totalPrice);
    }

    public function testTotalAmountWithFixedAndSpecialPricing()
    {
        $pricingConfiguration = [
            'A' => new SpecialPricing(3, 130, 50),
            'B' => new SpecialPricing(2, 45, 30),
            'C' => new FixedPricing(20),
            'D' => new FixedPricing(15),
        ];

        $checkout = new Checkout($pricingConfiguration);

        $checkout->scan('A');
        $checkout->scan('A');
        $checkout->scan('A');
        $checkout->scan('B');
        $checkout->scan('B');
        $checkout->scan('C');
        $checkout->scan('D');

        $totalPrice = $checkout->total();

        $this->assertEquals(210, $totalPrice);
    }

    public function testTotalAmountWithUnknownSku()
    {
        $pricingConfigurations = [
            'A' => new SpecialPricing(3, 130, 50),
            'B' => new FixedPricing(30),
            'C' => new FixedPricing(20),
        ];

        $checkout = new Checkout($pricingConfigurations);

        #unknown sku
        $checkout->scan('ABC');

        $checkout->scan('B');
        $checkout->scan('C');

        $totalPrice = $checkout->total();

        $this->assertEquals(50, $totalPrice);
    }
}
