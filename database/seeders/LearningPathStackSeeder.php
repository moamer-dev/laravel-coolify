<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LearningPath;
use App\Models\LearningStack;

class LearningPathStackSeeder extends Seeder
{
    public function run()
    {
        $pathStacks = [
            'frontend-development' => [
                'core-web-development',
                'css-frameworks',
                'javascript-frameworks',
                'state-management',
            ],
            'backend-development' => [
                'core-languages',
                'frameworks',
                'authentication',
                'api-development',
            ],
            'full-stack-development' => [
                'core-web-development',
                'css-frameworks',
                'javascript-frameworks',
                'state-management',
                'core-languages',
                'frameworks',
                'api-development',
            ],
            'mobile-development' => [
                'core-languages',
            ],
            'devops' => [
                'ci-cd-tools',
                'containerization',
                'infrastructure-as-code',
                'monitoring',
            ],
            'cloud-computing' => [
                'infrastructure-as-code',
                'containerization',
            ],
        ];

        foreach ($pathStacks as $pathSlug => $stackSlugs) {
            $learningPath = LearningPath::where('slug', $pathSlug)->first();

            if ($learningPath) {
                foreach ($stackSlugs as $stackSlug) {
                    $learningStack = LearningStack::where('slug', $stackSlug)->first();
                    if ($learningStack) {
                        $learningPath->learningStacks()->attach($learningStack->id);
                    }
                }
            }
        }
    }
}
