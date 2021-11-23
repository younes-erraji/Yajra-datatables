<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountriesFactory extends Factory
{
    protected $model = Country::class;
    public function definition()
    {
        return [
            'country_name' => $this->faker->unique()->name(),
            'capital_city' => $this->faker->unique()->name()
        ];
    }
}
