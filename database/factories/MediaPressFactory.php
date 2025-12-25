<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaPress>
 */
class MediaPressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'short_description' => $this->faker->paragraph(),
            'pdf_or_link' => $this->faker->randomElement([$this->faker->url(), 'sample.pdf']),
            'date' => $this->faker->date(),
            'image' => 'sample.jpg',
        ];
    }
}
