<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(),
            'image' => 'https://source.unsplash.com/200x200?sig=18128' . $this->faker->randomNumber(3),
            'address' => $this->faker->address(),
            'required' => $this->faker->randomNumber(4, true) * 1000,
            'collected' => $this->faker->randomNumber(7)
        ];
    }
}
