<?php

return function ($app) {
    $container = $app->getContainer();

    $container->set('settings', function () {
        return [
            'displayErrorDetails' => true,
            'db' => [
                'host' => 'localhost',
                'dbname' => 'api',
                'user' => 'root',
                'pass' => ''
            ]
        ];
    });
};
