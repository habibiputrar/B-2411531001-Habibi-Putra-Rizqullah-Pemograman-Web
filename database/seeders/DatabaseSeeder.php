<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MahasiswaSeeder::class,
            ProductSeeder::class,
            MajorSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
        ]);
    }
}