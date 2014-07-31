<?php

return [
    'modules' => [
        'ZendDeveloperTools',
        'VacancyBoard'
    ],
    'module_listener_options' => [
        'module_paths' => [
            MODULE_DIR,
            VENDOR_DIR
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
            CONFIG_DIR . '/{,*/}{global,local}.php'
        ]
    ]
];