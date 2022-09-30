<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_path' => $this->faker->imageUrl(720, 540),
            'link' => null,
            'position' => 1,
            'imageable_id' => 228,
            'imageable_type' => 'App\Models\Stall'
        ];
    }
}
