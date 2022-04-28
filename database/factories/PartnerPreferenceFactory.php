<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PartnerPreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'annual_income' => $this->faker->numberBetween(100, 100000),
            'occupation'  => $this->faker()->randomElement(['Private Job', 'Government Job', 'Business']),
            'family_type'=> $this->faker()->randomElement(['Joint Faimly', 'Nuclear Family']),
            'manglik' => $this->faker()->randomElement(['Yes', 'No'])
        ];
    }
}
