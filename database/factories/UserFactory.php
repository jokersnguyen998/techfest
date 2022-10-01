<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => 'Huy',
            'lastname' => 'Nguyễn',
            'username' => 'nqhuy',
            'email' => '',
            'password' => Hash::make("admin123!@#"),
            'type' => 1,
        ];
    }
}
