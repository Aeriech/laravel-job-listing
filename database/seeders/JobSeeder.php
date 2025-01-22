<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Job::factory(1000)->create();
    }
}
