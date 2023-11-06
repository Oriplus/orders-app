<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Orders\Index;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_the_component_can_render()
    {
        $component = Livewire::test(Index::class);

        $component->assertStatus(200);
    }

    public function test_can_paginate_orders()
    {
        Order::factory()->count(30)->create();

        Livewire::test('orders.index')
            ->assertStatus(200)
            ->assertViewHas('orders', function ($orders) {
                return $orders->count() === 10;
            })
            ->call('nextPage')
            ->assertViewHas('orders', function ($orders) {
                return $orders->count() === 10 && $orders->first()->id === 11;
            });
    }
}
