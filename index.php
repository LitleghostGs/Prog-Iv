<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

// Criação da instância do aplicativo Slim
$app = AppFactory::create();

// Middleware de roteamento e tratamento de erros
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Configurações do aplicativo
$settings = require __DIR__ . '/src/settings.php';
$settings($app);

// Definição das dependências
$dependencies = require __DIR__ . '/src/dependencies.php';
$dependencies($app);

// Definição das rotas
$routes = require __DIR__ . '/src/routes.php';
$routes($app);

// Execução da aplicação
$app->run();
