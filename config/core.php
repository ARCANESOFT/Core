<?php

return [

    /* -----------------------------------------------------------------
     |  Database
     | -----------------------------------------------------------------
     */

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

    /* -----------------------------------------------------------------
     |  Admin
     | -----------------------------------------------------------------
     */

    'admin' => [
        'prefix'     => 'dashboard',

        'name'       => 'admin::',

        'middleware' => ['web', 'auth', 'admin'],

        'route'      => 'admin::', // TODO: deprecate this attribute
    ],

    /* -----------------------------------------------------------------
     |  UI
     | -----------------------------------------------------------------
     */

    'ui' => [

        'links' => [
            'sizes' => [
                'lg' => 'btn-lg',
                'md' => '', // default
                'sm' => 'btn-sm',
                'xs' => 'btn-xs',
            ],

            'colors' => [
                'default' => 'btn-default', // For disabled state

                'add'     => 'btn-primary',
                'delete'  => 'btn-danger',
                'detach'  => 'btn-danger',
                'disable' => 'btn-inverse',
                'edit'    => 'btn-warning',
                'enable'  => 'btn-success',
                'restore' => 'btn-primary',
                'show'    => 'btn-info',
                'update'  => 'btn-warning',
            ],

            'icons' => [
                'add'     => 'fa fa-fw fa-plus',
                'delete'  => 'fa fa-fw fa-trash-o',
                'detach'  => 'fa fa-fw fa-chain-broken',
                'disable' => 'fa fa-fw fa-power-off',
                'edit'    => 'fa fa-fw fa-pencil',
                'enable'  => 'fa fa-fw fa-power-off',
                'restore' => 'fa fa-fw fa-reply',
                'show'    => 'fa fa-fw fa-search',
                'update'  => 'fa fa-fw fa-pencil',
            ],

        ],

    ],

];
