<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cafes')->insert([
            [
                'name' => 'Cafe One',
                'country' => 'United States',
                'province' => 'California',
                'city' => 'Los Angeles',
                'street_address' => '123 Main St',
                'postalcode' => '90001',
                'description' => 'A cozy cafe in Los Angeles.',
                'parking' => 'Street Parking',
            ],
            [
                'name' => 'Cafe Two',
                'country' => 'Canada',
                'province' => 'Ontario',
                'city' => 'Toronto',
                'street_address' => '456 Elm St',
                'postalcode' => 'M5X1E1',
                'description' => 'A stylish cafe in Toronto.',
                'parking' => 'Paid Parking Available',
            ],
            [
                'name' => 'Cafe Three',
                'country' => 'United States',
                'province' => 'New York',
                'city' => 'New York City',
                'street_address' => '789 Broadway',
                'postalcode' => '10001',
                'description' => 'An artsy cafe in NYC.',
                'parking' => 'Street Parking',
            ],
            [
                'name' => 'Cafe Four',
                'country' => 'Canada',
                'province' => 'British Columbia',
                'city' => 'Vancouver',
                'street_address' => '101 Waterfront Rd',
                'postalcode' => 'V6B1N8',
                'description' => 'A waterfront cafe in Vancouver.',
                'parking' => 'Paid Parking Available',
            ],
            [
                'name' => 'Cafe Five',
                'country' => 'United States',
                'province' => 'Texas',
                'city' => 'Austin',
                'street_address' => '555 Oak St',
                'postalcode' => '78701',
                'description' => 'A hip cafe in Austin.',
                'parking' => 'Street Parking',
            ],
            [
                'name' => 'Cafe Six',
                'country' => 'United States',
                'province' => 'Arizona',
                'city' => 'Austin',
                'street_address' => '123 Oak St',
                'postalcode' => '33701',
                'description' => 'A hip cafe in Austin.',
                'parking' => 'Street Parking',
            ],
            [
                'name' => 'Cafe Seven',
                'country' => 'United States',
                'province' => 'Iowa',
                'city' => 'Austin',
                'street_address' => '456 Oak St',
                'postalcode' => '78744',
                'description' => 'A hip cafe in Austin.',
                'parking' => 'Street Parking',
            ],
            
        ]);
    }
}
