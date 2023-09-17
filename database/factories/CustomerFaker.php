<?php

namespace Database\Factories;

use App\Models\Customer;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFaker extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID');
        return [
            'name' => $faker->name(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
    }
}
