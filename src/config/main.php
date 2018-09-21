<?php

return [
    'storage' => [
        1 => [
            'login' => 'user',
            'password' => '',
            'name' => 'Vasia'
        ],
        2 => [
            'login' => 'user1',
            'password' => 'passwd',
            'name' => 'Lena'
        ],
    ],
    'router' => [
        '' => [
            'class' => Controller::class ,
            'action' => 'index'
        ],
        'user' => [
            'class' => UserController::class,
            'action' => 'user'
        ],
        'logout' => [
            'class' => AuthController::class,
            'action' => 'logout'
        ],
        'login' => [
            'class' => AuthController::class,
            'action' => 'login'
        ],
    ],
];
