<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\CountriesSeeder;
use Database\Seeders\CurrenciesSeeder;
use Database\Seeders\CoursesSeeder;
use Database\Seeders\LevelsSeeder;
use Database\Seeders\ProjectsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CategoriesSeeder::class,
            CountriesSeeder::class,
            CurrenciesSeeder::class,
            LevelsSeeder::class,
            CoursesSeeder::class,
            ProjectsSeeder::class,
        ]);
    }
}
