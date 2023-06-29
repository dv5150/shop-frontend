<?php

namespace DV5150\Shop\Frontend\Contracts;

use Illuminate\View\View;

interface ProductListComposerServiceContract
{
    public function getProductListData(): array;
}