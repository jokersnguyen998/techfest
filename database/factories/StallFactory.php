<?php

namespace Database\Factories;

use App\Models\Stall;
use Illuminate\Database\Eloquent\Factories\Factory;

class StallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'video_path' => $this->faker->imageUrl(720, 540),
            'stall_image_path' => null,
            'logo' => $this->faker->imageUrl(500, 500),
            'standy' => $this->faker->imageUrl(600, 1342),
            'description' => $this->faker->text(255),
            'contact' => null,
            'position' => null,
        ];
    }
}
