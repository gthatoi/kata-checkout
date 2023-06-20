<?php

namespace App\Http\Controllers;

use App\Models\Pricing\Checkout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(private readonly Checkout $checkout) {}

    public function post(Request $request): JsonResponse
    {
        $skus = !empty($request->getContent()) ?
            \json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR)['skus'] ?? []
            : [];

        foreach ($skus as $sku) {
            $this->checkout->scan($sku);
        }

        $totalAmount = $this->checkout->total();

        return response()->json([
            'totalAmount' => $totalAmount ?? 0,
        ]);
    }
}
