<?php

namespace Tests\Feature;

use App\Jobs\CalculateTotalCost;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CalculateTotalCostTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $order = Order::factory()->create();

        $product = Product::factory()->create([
            'cost' => 10.00
        ]);

        OrderLine::factory()->create([
            'qty' => 2,
            'product_id' => $product->id,
            'order_id' => $order->id
        ]);
    }

    public function test_dispatches_calculate_total_cost_job(): void
    {
        Queue::fake();
        CalculateTotalCost::dispatch();
        Queue::assertPushed(CalculateTotalCost::class);
    }

    public function test_calculates_total_cost_correctly(): void
    {
        Log::shouldReceive('info')
            ->once()
            ->withArgs(function ($message) {
                return str_contains($message, 'Orders Cost Total: 20');
            });
        $job = new CalculateTotalCost();
        $job->handle();
    }
}
