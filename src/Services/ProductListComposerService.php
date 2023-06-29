<?php

namespace DV5150\Shop\Frontend\Services;

use DV5150\Shop\Frontend\Contracts\ProductListComposerServiceContract;

class ProductListComposerService implements ProductListComposerServiceContract
{
    public function getProductListData(): array
    {
        return [
            'products' => config('shop.resources.productList')::collection(
                config('shop.models.product')::with([
                    'categories', 'discounts'
                ])->get()
            )->toJson()
        ];
    }
}