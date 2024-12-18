<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningStack;
use App\Models\TechnologyStack;

class TechnologyStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologyStacks = [
            // Frontend Technologies
            ['name' => 'HTML', 'slug' => 'html', 'description' => 'Standard markup language for web pages.', 'type' => 'language', 'related_stacks' => ['core-web-development']],
            ['name' => 'CSS', 'slug' => 'css', 'description' => 'Style sheet language for web design.', 'type' => 'language', 'related_stacks' => ['core-web-development', 'css-frameworks']],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'description' => 'High-level programming language for web development.', 'type' => 'language', 'related_stacks' => ['core-web-development', 'javascript-frameworks']],
            ['name' => 'React.js', 'slug' => 'react', 'description' => 'JavaScript library for building user interfaces.', 'type' => 'framework', 'related_stacks' => ['javascript-frameworks']],
            ['name' => 'Vue.js', 'slug' => 'vue', 'description' => 'Progressive JavaScript framework.', 'type' => 'framework', 'related_stacks' => ['javascript-frameworks']],
            ['name' => 'Angular', 'slug' => 'angular', 'description' => 'Platform for building mobile and desktop web apps.', 'type' => 'framework', 'related_stacks' => ['javascript-frameworks']],
            ['name' => 'Sass', 'slug' => 'sass', 'description' => 'CSS extension language.', 'type' => 'framework', 'related_stacks' => ['css-frameworks']],
            ['name' => 'Tailwind CSS', 'slug' => 'tailwind-css', 'description' => 'Utility-first CSS framework.', 'type' => 'framework', 'related_stacks' => ['css-frameworks']],
            ['name' => 'Bootstrap', 'slug' => 'bootstrap', 'description' => 'Front-end framework for web development.', 'type' => 'framework', 'related_stacks' => ['css-frameworks']],
            ['name' => 'Redux', 'slug' => 'redux', 'description' => 'Predictable state container for JavaScript apps.', 'type' => 'framework', 'related_stacks' => ['state-management']],
            ['name' => 'MobX', 'slug' => 'mobx', 'description' => 'Simple, scalable state management.', 'type' => 'framework', 'related_stacks' => ['state-management']],
            ['name' => 'Vuex', 'slug' => 'vuex', 'description' => 'State management pattern and library for Vue.js.', 'type' => 'framework', 'related_stacks' => ['state-management']],
            ['name' => 'GraphQL', 'slug' => 'graphql', 'description' => 'Query language for APIs.', 'type' => 'framework', 'related_stacks' => ['api-development']],
            ['name' => 'REST', 'slug' => 'rest', 'description' => 'Architectural style for designing networked applications.', 'type' => 'framework', 'related_stacks' => ['api-development']],
            ['name' => 'Nextjs', 'slug' => 'nextjs', 'description' => 'React framework for production.', 'type' => 'framework', 'related_stacks' => ['javascript-frameworks']],
            ['name' => 'Gatsby', 'slug' => 'gatsby', 'description' => 'Static site generator for React.', 'type' => 'framework', 'related_stacks' => ['javascript-frameworks']],


            // Backend Technologies
            ['name' => 'PHP', 'slug' => 'php', 'description' => 'Server-side scripting language.', 'type' => 'language', 'related_stacks' => ['core-languages']],
            ['name' => 'Python', 'slug' => 'python', 'description' => 'High-level programming language.', 'type' => 'language', 'related_stacks' => ['core-languages']],
            ['name' => 'Node.js', 'slug' => 'nodejs', 'description' => 'JavaScript runtime for server-side programming.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'Django', 'slug' => 'django', 'description' => 'Python framework for web development.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'Laravel', 'slug' => 'laravel', 'description' => 'PHP framework for web development.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'Express.js', 'slug' => 'express', 'description' => 'Fast, unopinionated, minimalist web framework for Node.js.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'Flask', 'slug' => 'flask', 'description' => 'Lightweight WSGI web application framework.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'Spring Boot', 'slug' => 'spring-boot', 'description' => 'Java-based framework for building web applications.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'Ruby on Rails', 'slug' => 'ruby-on-rails', 'description' => 'Ruby framework for building web applications.', 'type' => 'framework', 'related_stacks' => ['frameworks']],
            ['name' => 'ASP.NET', 'slug' => 'asp-net', 'description' => 'Framework for building web applications.', 'type' => 'framework', 'related_stacks' => ['frameworks']],

            // Mobile App Technologies
            ['name' => 'Swift', 'slug' => 'swift', 'description' => 'Powerful and intuitive programming language.', 'type' => 'language', 'related_stacks' => ['mobile-development']],
            ['name' => 'Flutter', 'slug' => 'flutter', 'description' => 'UI toolkit for building natively compiled applications.', 'type' => 'framework', 'related_stacks' => ['mobile-development']],
            ['name' => 'React Native', 'slug' => 'react-native', 'description' => 'Framework for building native apps using React.', 'type' => 'framework', 'related_stacks' => ['mobile-development']],
            ['name' => 'Kotlin', 'slug' => 'kotlin', 'description' => 'Modern programming language for Android development.', 'type' => 'language', 'related_stacks' => ['mobile-development']],
            ['name' => 'Java', 'slug' => 'java', 'description' => 'Object-oriented programming language.', 'type' => 'language', 'related_stacks' => ['mobile-development']],
            ['name' => 'Xamarin', 'slug' => 'xamarin', 'description' => 'App platform for building Android and iOS apps.', 'type' => 'framework', 'related_stacks' => ['mobile-development']],
            ['name' => 'PhoneGap', 'slug' => 'phonegap', 'description' => 'Mobile development framework.', 'type' => 'framework', 'related_stacks' => ['mobile-development']],
            ['name' => 'Ionic', 'slug' => 'ionic', 'description' => 'Framework for building cross-platform mobile apps.', 'type' => 'framework', 'related_stacks' => ['mobile-development']],
            ['name' => 'Objective-C', 'slug' => 'objective-c', 'description' => 'General-purpose, object-oriented programming language.', 'type' => 'language', 'related_stacks' => ['mobile-development']],

            //Database Technologies
            ['name' => 'PostgreSQL', 'slug' => 'postgresql', 'description' => 'Open-source relational database system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'MySQL', 'slug' => 'mysql', 'description' => 'Open-source relational database management system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'MongoDB', 'slug' => 'mongodb', 'description' => 'Document-oriented NoSQL database.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Redis', 'slug' => 'redis', 'description' => 'In-memory data structure store.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Elasticsearch', 'slug' => 'elasticsearch', 'description' => 'Distributed, RESTful search and analytics engine.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'SQLite', 'slug' => 'sqlite', 'description' => 'Self-contained, serverless, zero-configuration, transactional SQL database engine.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Cassandra', 'slug' => 'cassandra', 'description' => 'Distributed NoSQL database management system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Couchbase', 'slug' => 'couchbase', 'description' => 'Distributed NoSQL cloud database.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'DynamoDB', 'slug' => 'dynamodb', 'description' => 'Fully managed NoSQL database service.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Firebase', 'slug' => 'firebase', 'description' => 'Platform for building mobile and web applications.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Realm', 'slug' => 'realm', 'description' => 'Mobile database platform.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'RethinkDB', 'slug' => 'rethinkdb', 'description' => 'Open-source, distributed document-oriented database.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'SQL Server', 'slug' => 'sql-server', 'description' => 'Relational database management system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'SQLite', 'slug' => 'sqlite', 'description' => 'Self-contained, serverless, zero-configuration, transactional SQL database engine.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Cassandra', 'slug' => 'cassandra', 'description' => 'Distributed NoSQL database management system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Solr', 'slug' => 'solr', 'description' => 'Open-source search platform.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Neo4j', 'slug' => 'neo4j', 'description' => 'Graph database management system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'ArangoDB', 'slug' => 'arangodb', 'description' => 'Multi-model database management system.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'MariaDB', 'slug' => 'mariadb', 'description' => 'Community-developed fork of MySQL.', 'type' => 'database', 'related_stacks' => ['databases']],
            ['name' => 'Prisma', 'slug' => 'prisma', 'description' => 'Next-generation ORM for Node.js and TypeScript.', 'type' => 'database', 'related_stacks' => ['databases']],
            // DevOps Technologies
            ['name' => 'Docker', 'slug' => 'docker', 'description' => 'Platform for containerization.', 'type' => 'tool', 'related_stacks' => ['containerization']],
            ['name' => 'Kubernetes', 'slug' => 'kubernetes', 'description' => 'Container orchestration system.', 'type' => 'tool', 'related_stacks' => ['containerization']],
        ];

        foreach ($technologyStacks as $tech) {
            $technology = TechnologyStack::updateOrCreate(
                ['slug' => $tech['slug'], 'name' => $tech['name'], 'description' => $tech['description'], 'type' => $tech['type']]
            );

            //Attach to related learning stacks
            if (isset($tech['related_stacks'])) {
                foreach ($tech['related_stacks'] as $stackSlug) {
                    $learningStack = LearningStack::where('slug', $stackSlug)->first();
                    if ($learningStack) {
                        $learningStack->technologyStacks()->attach($technology->id);
                    }
                }
            }
        }
    }
}
