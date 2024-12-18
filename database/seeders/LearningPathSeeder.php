<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningPath;

class LearningPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learningPaths = [
            ['title' => 'Frontend Development', 'slug' => 'frontend-development', 'description' => 'Master web design and user interface development.', 'is_active' => true],
            ['title' => 'Backend Development', 'slug' => 'backend-development', 'description' => 'Build robust and scalable server-side applications.', 'is_active' => true],
            ['title' => 'Full-Stack Development', 'slug' => 'full-stack-development', 'description' => 'Develop complete web applications from frontend to backend.', 'is_active' => true],
            ['title' => 'Mobile Development', 'slug' => 'mobile-development', 'description' => 'Create native and cross-platform mobile apps.', 'is_active' => true],
            ['title' => 'Cloud Computing', 'slug' => 'cloud-computing', 'description' => 'Deploy and manage cloud infrastructure.', 'is_active' => true],
            ['title' => 'DevOps', 'slug' => 'devops', 'description' => 'Master continuous integration, delivery, and deployment.', 'is_active' => true],
            ['title' => 'Data Science', 'slug' => 'data-science', 'description' => 'Analyze data and build machine learning models.', 'is_active' => true],
            ['title' => 'Cybersecurity', 'slug' => 'cybersecurity', 'description' => 'Secure systems and protect data.', 'is_active' => true],
            ['title' => 'Software Testing', 'slug' => 'software-testing', 'description' => 'Ensure software quality through testing practices.', 'is_active' => true],
            ['title' => 'Game Development', 'slug' => 'game-development', 'description' => 'Learn to create engaging and interactive games.', 'is_active' => true],
        ];

        foreach ($learningPaths as $path) {
            LearningPath::create($path);
        }
    }
}
