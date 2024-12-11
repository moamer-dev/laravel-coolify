<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                "name" => "Beginner",
            ],
            [
                "name" => "Intermediate",
            ],
            [
                "name" => "Advanced",
            ],
        ];
        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
