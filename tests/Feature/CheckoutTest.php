<?php

namespace DV5150\Shop\Frontend\Tests\Feature;

use DV5150\Shop\Contracts\Models\OrderContract;
use DV5150\Shop\Tests\TestCase;
use Illuminate\Testing\TestResponse;

class CheckoutTest extends TestCase
{
    /** @test */
    public function thank_you_page_throws_404_when_no_order_was_found(): void
    {
        $this->get(route('shop.order.thankYou', [
            'uuid' => 'a-b-c-d-e-f-not-found'
        ]))->assertStatus(404);
    }

    protected function checkThankYouPageAccessWithOrderAvailable(
        TestResponse $response,
        OrderContract $order
    ): void {
        $response->assertStatus(201)
            ->assertJson([
                'redirectUrl' => $order->getThankYouUrl()
            ]);

        $this->get($order->getThankYouUrl())
            ->assertStatus(200)
            ->assertViewIs('shop::thankYou');
    }
}