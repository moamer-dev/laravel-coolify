<?php
return [
    'dashboard_options' => [
        [
            'title' => 'حسابي',
            'route' => 'profile.overview',
            'icon' => 'ki-plus-square',
        ],
        [
            'title' => 'مركز التعلم',
            'route' => 'profile.learningCenter',
            'icon' => 'ki-book',
        ],
        [
            'title' => 'الإعدادات',
            'route' => 'profile.settings',
            'icon' => 'ki-gear',
        ],
        [
            'title' => 'الدورات',
            'route' => 'learn',
            'icon' => 'ki-message-edit',
        ],
        [
            'title' => 'مسارات التعلم',
            'route' => 'user.path-view',
            'icon' => 'ki-rocket',
        ],
        [
            'title' => 'مركز المساعدة',
            'route' => 'user.path-view',
            'icon' => 'ki-rescue',
        ],

    ],
    'sidebar_items' => [
        [
            'title' => 'لوحة التحكم',
            'route' => 'dashboard',
            'icon' => 'ki-abstract-41',
            'path' => 'user/dashboard*',
            'color' => 'success',
        ],
        [
            'title' => 'مركز التعلم',
            'route' => 'profile.learningCenter',
            'icon' => 'ki-book',
            'path' => 'user/learning-center/overview*',
            'color' => 'info',
        ],
        [
            'title' => 'الإحصائيات',
            'route' => 'user.progress',
            'icon' => 'ki-calendar',
            'path' => 'user/progress*',
            'color' => 'danger',
        ],
        [
            'title' => 'الإشعارات',
            'route' => 'user.notifications',
            'icon' => 'ki-calendar',
            'path' => 'user/notifications*',
            'color' => 'warning',
        ]
    ],
    'sidebar_learing_center_items' => [
        [
            'title' => 'مركز التعلم',
            'route' => 'profile.learningCenter',
            'icon' => 'ki-rocket',
            'path' => 'user/learning-center/overview*',
            'color' => 'success',
        ],
        [
            'title' => 'مساراتك التعليمية',
            'route' => 'profile.learning-path',
            'icon' => 'ki-picture',
            'path' => 'profile/learning-path*',
            'color' => 'info',
        ],
        [
            'title' => 'خطة التعلم',
            'route' => 'user.path-todo',
            'icon' => 'ki-subtitle',
            'path' => 'user/learning-center/plan*',
            'color' => 'warning',
        ],
        [
            'title' => 'التكنولوجيات',
            'route' => 'user.teschnologies',
            'icon' => 'ki-subtitle',
            'path' => 'user/learning-center/technologies*',
            'color' => 'info',
        ],
        [
            'title' => 'محاولات الإختبارات',
            'route' => 'user.quiz-attempts',
            'icon' => 'ki-message-edit',
            'path' => 'profile/quiz-attempts*',
            'color' => 'danger',
        ],

    ],
    'sidebar_account_items' => [
        [
            'title' => 'بياناتي',
            'route' => 'profile.overview',
            'icon' => 'ki-element-11',
            'path' => 'profile/overview*',
            'color' => 'success',
        ],
        [
            'title' => 'الاعدادات',
            'route' => 'profile.settings',
            'icon' => 'ki-subtitle',
            'path' => 'profile/settings*',
            'color' => 'info',
        ],
        [
            'title' => 'إعدادات الدفع',
            'route' => 'profile.billing',
            'icon' => 'ki-calendar',
            'path' => 'profile/billing*',
            'color' => 'warning',
        ],

    ],
    'profile_header_items' => [
        [
            'title' => 'بياناتي',
            'route' => 'profile.overview',
            'icon' => 'ki-element-11',
            'path' => 'profile/overview*',
            'color' => 'success',
        ],
        [
            'title' => 'الاعدادات',
            'route' => 'profile.settings',
            'icon' => 'ki-subtitle',
            'path' => 'profile/settings*',
            'color' => 'info',
        ],
        [
            'title' => 'إعدادات الدفع',
            'route' => 'profile.billing',
            'icon' => 'ki-calendar',
            'path' => 'profile/billing*',
            'color' => 'warning',
        ],
        [
            'title' => 'إختيار مسارات التعلم',
            'route' => 'profile.learning-path',
            'icon' => 'ki-picture',
            'path' => 'profile/learning-path*',
            'color' => 'info',
        ],
        [
            'title' => 'محاولات الإختبارات',
            'route' => 'user.quiz-attempts',
            'icon' => 'ki-message-edit',
            'path' => 'profile/quiz-attempts*',
            'color' => 'danger',
        ],

    ],
];
