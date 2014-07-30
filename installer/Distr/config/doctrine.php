<?php

return [
    'params' => [
        'host' => [
            'default' => 'localhost',
            'message' => 'Database host'
        ],
        'port' => [
            'default' => '3306',
            'message' => 'Database port'
        ],
        'user' => [
            'message' => 'Database user'
        ],
        'password' => [
            'message' => 'Database password'
        ],
        'dbname' => [
            'message' => 'Database name'
        ]
    ],
    'result' => [
        'doctrine' => [
            'connection' => [
                'orm_default' => [
                    'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => [
                        'host'     => '%host%',
                        'port'     => '%port%',
                        'user'     => '%user%',
                        'password' => '%password%',
                        'dbname'   => '%dbname%'
                    ]
                ]
            ]
        ]
    ],
];