<?php

return [
    'doctrine' => [
        'driver' => [
            'vacancy_board_entity' => [
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => [
                    __DIR__ . '/../src/VacancyBoard/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'VacancyBoard\Entity' => 'vacancy_board_entity'
                ]
            ]
        ]
    ],
    'data-fixture' => [
        'VacancyBoard_fixture' => __DIR__ . '/../src/VacancyBoard/Fixtures'
    ]
];