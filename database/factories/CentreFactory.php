<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class CentreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom" => $this->faker->firstName,
        ];
    }
}
