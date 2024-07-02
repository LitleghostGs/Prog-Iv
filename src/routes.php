<?php

use Slim\App;
use App\Controllers\UserController;

return function (App $app) {
    $app->get('/', UserController::class . ':index');
    $app->get('/novo', UserController::class . ':createForm');
    $app->post('/novo', UserController::class . ':create');
    $app->get('/alterar/{id}', UserController::class . ':editForm');
    $app->post('/alterar/{id}', UserController::class . ':update');
    $app->get('/excluir/{id}', UserController::class . ':delete');
};
