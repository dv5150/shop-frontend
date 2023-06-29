<?php

namespace DV5150\Shop\Frontend\Http\Controllers;

class ShopController
{
    public function showThankYouPage(string $uuid)
    {
        $order = config('shop.models.order')::with(['items.product'])
            ->firstWhere('uuid', $uuid);

        abort_if(!$order, 404, __('Order not found.'));

        return view('shop::thankYou', [
            'order' => $order
        ]);
    }
}
