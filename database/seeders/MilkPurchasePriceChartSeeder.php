<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MilkPurchasePriceChart;

class MilkPurchasePriceChartSeeder extends Seeder
{
    public function run()
    {
        MilkPurchasePriceChart::factory(25)->create(); // Create 25 records to test pagination
    }
}