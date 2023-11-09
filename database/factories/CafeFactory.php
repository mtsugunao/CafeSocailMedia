<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cafe>
 */
class CafeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'country' => $this->faker->country(),
            'province' => 'British Columbia',
            'city' => $this->faker->city(),
            'street_address' => $this->faker->streetAddress(),
            'postalcode' => 'V1R5N6',
        ];
    }
}
