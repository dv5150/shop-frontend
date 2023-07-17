<?php

use DV5150\Shop\Frontend\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('order/{order:uuid}/thank-you', [ShopController::class, 'showThankYouPage'])
    ->name('order.thankYou');
