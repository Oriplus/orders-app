<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_ref' => Str::upper(Str::random(10)),
            'customer_name' => $this->faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
