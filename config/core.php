<?php

return [
    'database' => [
        'default'     => 'sqlite',

        'connections' => [
            'sqlite' => [
                'driver'   => 'sqlite',
                'database' => database_path('arcanesoft.sqlite'),
                'prefix'   => '',
            ],
        ],
    ],
];
