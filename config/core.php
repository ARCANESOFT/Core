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

        'buttons' => [
            'sizes' => [
                'lg' => 'btn-lg',
                'md' => '', // default
                'sm' => 'btn-sm',
                'xs' => 'btn-xs',
            ],

            'colors' => [
                'default'  => 'btn-default', // For disabled state

                'add'      => 'btn-primary',
                'backup'   => 'btn-success',
                'cancel'   => 'btn-default',
                'clear'    => 'btn-warning',
                'close'    => 'btn-default',
                'create'   => 'btn-primary',
                'delete'   => 'btn-danger',
                'detach'   => 'btn-danger',
                'disable'  => 'btn-inverse',
                'download' => 'btn-success',
                'edit'     => 'btn-warning',
                'enable'   => 'btn-success',
                'restore'  => 'btn-primary',
                'show'     => 'btn-info',
                'update'   => 'btn-warning',
                'validate' => 'btn-success',
            ],

            'icons' => [
                'add'      => 'fa fa-fw fa-plus',
                'backup'   => 'fa fa-fw fa-floppy-o',
                'cancel'   => 'fa fa-fw fa-times',
                'clear'    => 'fa fa-fw fa-eraser',
                'close'    => 'fa fa-fw fa-times',
                'create'   => 'fa fa-fw fa-plus',
                'delete'   => 'fa fa-fw fa-trash-o',
                'detach'   => 'fa fa-fw fa-chain-broken',
                'disable'  => 'fa fa-fw fa-power-off',
                'download' => 'fa fa-fw fa-download',
                'edit'     => 'fa fa-fw fa-pencil',
                'enable'   => 'fa fa-fw fa-power-off',
                'restore'  => 'fa fa-fw fa-reply',
                'show'     => 'fa fa-fw fa-search',
                'update'   => 'fa fa-fw fa-pencil',
                'validate' => 'fa fa-fw fa-check',
            ],
        ],

        'links'   => [
            'sizes' => [
                'lg' => 'btn-lg',
                'md' => '', // default
                'sm' => 'btn-sm',
                'xs' => 'btn-xs',
            ],

            'colors' => [
                'default'  => 'btn-default', // For disabled state

                'add'      => 'btn-primary',
                'backup'   => 'btn-success',
                'cancel'   => 'btn-default',
                'clear'    => 'btn-warning',
                'close'    => 'btn-default',
                'create'   => 'btn-primary',
                'delete'   => 'btn-danger',
                'detach'   => 'btn-danger',
                'disable'  => 'btn-inverse',
                'download' => 'btn-success',
                'edit'     => 'btn-warning',
                'enable'   => 'btn-success',
                'restore'  => 'btn-primary',
                'show'     => 'btn-info',
                'update'   => 'btn-warning',
                'validate' => 'btn-success',
            ],

            'icons' => [
                'add'      => 'fa fa-fw fa-plus',
                'backup'   => 'fa fa-fw fa-floppy-o',
                'cancel'   => 'fa fa-fw fa-times',
                'clear'    => 'fa fa-fw fa-eraser',
                'close'    => 'fa fa-fw fa-times',
                'create'   => 'fa fa-fw fa-plus',
                'delete'   => 'fa fa-fw fa-trash-o',
                'detach'   => 'fa fa-fw fa-chain-broken',
                'disable'  => 'fa fa-fw fa-power-off',
                'download' => 'fa fa-fw fa-download',
                'edit'     => 'fa fa-fw fa-pencil',
                'enable'   => 'fa fa-fw fa-power-off',
                'restore'  => 'fa fa-fw fa-reply',
                'show'     => 'fa fa-fw fa-search',
                'update'   => 'fa fa-fw fa-pencil',
                'validate' => 'fa fa-fw fa-check',
            ],

        ],

    ],

];
