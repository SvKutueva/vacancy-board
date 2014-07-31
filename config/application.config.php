<?php

return [
    'modules' => [
        'ZendDeveloperTools',
        'DoctrineModule',
        'DoctrineORMModule',
        'VacancyBoard'
    ],
    'module_listener_options' => [
        'module_paths' => [
            __DIR__ . '/../module',
            __DIR__ . '/../vendor'
        ],

        /**
         * Set configuration files autoloader glob pattern
         *
         * Loading priority:
         *
         *  1. config/global.php
         *     config/local.php
         *  2. config/MODULE_A/global.php
         *     config/MODULE_A/local.php
         *  3. config/MODULE_B/global.php
         *     config/MODULE_B/local.php
         */
        'config_glob_paths' => [
            __DIR__ . '/../config/{,*/}{global,local}.php'
        ]
    ]
];