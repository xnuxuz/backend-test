<?php

namespace Database\Factories;

use App\Models\CustomerAddress;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFaker extends Factory
{
    protected $model = CustomerAddress::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID');
    	return [
    	    'address' => $faker->address(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
    	];
    }
}
