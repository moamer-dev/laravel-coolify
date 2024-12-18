<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningStack;

class LearningStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learningStacks = [
            // Frontend Stacks
            ['title' => 'Core Web Development', 'slug' => 'core-web-development', 'description' => 'HTML, CSS, and JavaScript basics.', 'is_active' => true],
            ['title' => 'CSS Frameworks', 'slug' => 'css-frameworks', 'description' => 'Learn popular CSS frameworks for styling.', 'is_active' => true],
            ['title' => 'JavaScript Frameworks', 'slug' => 'javascript-frameworks', 'description' => 'Master modern JavaScript frameworks.', 'is_active' => true],
            ['title' => 'State Management', 'slug' => 'state-management', 'description' => 'Manage application state effectively.', 'is_active' => true],

            ['title' => 'Database Management', 'slug' => 'databases', 'description' => 'Learn to manage databases.', 'is_active' => true],
            ['title' => 'Mobile App Development', 'slug' => 'mobile-development', 'description' => 'Develop mobile applications.', 'is_active' => true],
            // Backend Stacks
            ['title' => 'Core Languages', 'slug' => 'core-languages', 'description' => 'Learn backend programming languages.', 'is_active' => true],
            ['title' => 'Frameworks', 'slug' => 'frameworks', 'description' => 'Backend frameworks for rapid development.', 'is_active' => true],
            ['title' => 'Authentication', 'slug' => 'authentication', 'description' => 'Implement secure user authentication.', 'is_active' => true],
            ['title' => 'API Development', 'slug' => 'api-development', 'description' => 'Build and document RESTful and GraphQL APIs.', 'is_active' => true],

            // DevOps Stacks
            ['title' => 'CI/CD Tools', 'slug' => 'ci-cd-tools', 'description' => 'Automate builds, tests, and deployments.', 'is_active' => true],
            ['title' => 'Containerization', 'slug' => 'containerization', 'description' => 'Docker and Kubernetes for deployment.', 'is_active' => true],
            ['title' => 'Infrastructure as Code', 'slug' => 'infrastructure-as-code', 'description' => 'Terraform and CloudFormation for infrastructure automation.', 'is_active' => true],
            ['title' => 'Monitoring', 'slug' => 'monitoring', 'description' => 'Track system performance and uptime.', 'is_active' => true],
        ];

        foreach ($learningStacks as $stack) {
            LearningStack::create($stack);
        }
    }
}
