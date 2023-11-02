<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $products = Product::pluck('id');

        foreach ($orders as $order) {
            OrderLine::factory(rand(1, 4))->create([
                'order_id' => $order->id,
                'product_id' => $products->random()
            ]);
        }
    }
}
