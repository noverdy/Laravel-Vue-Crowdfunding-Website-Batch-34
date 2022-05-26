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
        $required = $this->faker->randomNumber(4) * 1000;
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'image' => 'https://source.unsplash.com/200x200?sig=' . $this->faker->randomNumber(3),
            'address' => $this->faker->address(),
            'required' => $required,
            'collected' => min([$required, $this->faker->randomNumber(7)]),
        ];
    }
}
