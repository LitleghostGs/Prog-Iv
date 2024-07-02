<?php

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

return function ($app) {
    $container = $app->getContainer();

    // Database connection
    $container->set('db', function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'], $settings['user'], $settings['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    });

    // Renderer
    $container->set('renderer', function () {
        return new PhpRenderer(__DIR__ . '/../public/');
    });
};
