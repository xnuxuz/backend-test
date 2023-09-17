<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Customer::factory(10)->create()->each(function($customer){
        CustomerAddress::factory()->create([
                'customer_id' => $customer->id
            ]);
        });
    }
}
