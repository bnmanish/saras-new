<?php

namespace Database\Factories;

use App\Models\MilkPurchasePriceChart;
use Illuminate\Database\Eloquent\Factories\Factory;

class MilkPurchasePriceChartFactory extends Factory
{
    protected $model = MilkPurchasePriceChart::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'publish_date' => $this->faker->date(),
            'file' => null, // We'll handle file separately or leave as null for now
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}