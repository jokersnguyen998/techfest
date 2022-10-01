<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        // $this->call(StallTableSeeder::class);
        // $this->call(PostTableSeeder::class);
        // \App\Models\Submit::factory(3)->create();
        // \App\Models\Speaker::factory(5)->create();
        // \App\Models\Discussion::factory(5)->create();
        // \App\Models\Image::factory(2)->create();
        // \App\Models\Stall::factory(10)->create();
    }
}
