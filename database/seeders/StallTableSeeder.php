<?php

namespace Database\Seeders;

use App\Models\Stall;
use Illuminate\Database\Seeder;

class StallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stall::factory()->count(50)->create();
    }
}
