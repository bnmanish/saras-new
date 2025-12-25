<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DealershipEnquiry;

class DealershipEnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DealershipEnquiry::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'business_name' => 'Doe Retailers',
            'business_address' => '123 Main Street',
            'city' => 'New York',
            'state' => 'NY',
            'pin_code' => '10001',
            'type_of_business' => 'retailer',
            'approx_daily_requirement' => '50',
            'additional_notes' => 'Looking forward to partnership.',
            'agree_terms' => true,
        ]);

        DealershipEnquiry::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '0987654321',
            'business_name' => 'Smith Wholesalers',
            'business_address' => '456 Business Ave',
            'city' => 'Los Angeles',
            'state' => 'CA',
            'pin_code' => '90210',
            'type_of_business' => 'wholesaler',
            'approx_daily_requirement' => '200',
            'additional_notes' => 'Need bulk supplies.',
            'agree_terms' => true,
        ]);

        DealershipEnquiry::create([
            'first_name' => 'Bob',
            'last_name' => 'Johnson',
            'email' => 'bob.johnson@example.com',
            'phone' => '1122334455',
            'business_name' => 'Johnson Distributors',
            'business_address' => '789 Distribution Blvd',
            'city' => 'Chicago',
            'state' => 'IL',
            'pin_code' => '60601',
            'type_of_business' => 'distributor',
            'approx_daily_requirement' => '500',
            'additional_notes' => 'Established network ready.',
            'agree_terms' => true,
        ]);
    }
}
