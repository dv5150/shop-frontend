<?php

namespace DV5150\Shop\Frontend\Http\Controllers;

use DV5150\Shop\Contracts\Models\OrderContract;

class ShopController
{
    public function showThankYouPage(OrderContract $order)
    {
        return view('shop::thankYou', [
            'order' => $order->load(['items.sellable'])
        ]);
    }
}
