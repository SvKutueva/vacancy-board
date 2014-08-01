<?php

return [
    'params' => [
        'enabled' => [
            'default' => false,
            'message' => 'Enable developer toolbar'
        ]
    ],
    'result' => [
        'zenddevelopertools' => [
            'profiler' => [
                'enabled' => '%enabled%',
                'strict' => true,
                'flush_early' => false,
                'cache_dir' => 'data/cache',
                'matcher' => array(),
                'collectors' => array()
            ],
            'events' => [
                'enabled' => '%enabled%',
                'collectors' => [],
                'identifiers' => []
            ],
            'toolbar' => [
                'enabled' => '%enabled%',
                'auto_hide' => true,
                'position' => 'bottom',
                'version_check' => false,
                'entries' => []
            ]
        ]
    ]
];
