<?php

namespace DV5150\Shop\Frontend\View\Composers;

use DV5150\Shop\Frontend\Contracts\ProductListComposerServiceContract;
use Illuminate\View\View;

class ProductListComposer
{
    public function compose(View $view)
    {
        $view->with(app(ProductListComposerServiceContract::class)->getProductListData());
    }
}