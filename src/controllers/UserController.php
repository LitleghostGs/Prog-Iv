<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class UserController {
    protected $db;
    protected $renderer;

    public function __construct($container) {
        $this->db = $container->get('db');
        $this->renderer = $container->get('renderer');
    }

    public function index(Request $request, Response $response, $args) {
        $stmt = $this->db->query('SELECT * FROM usuarios');
        $users = $stmt->fetchAll();
        return $this->renderer->render($response, "index.html", ['users' => $users]);
    }

    public function createForm(Request $request, Response $response, $args) {
        return $this->renderer->render($response, "novo.html");
    }

    public function create(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->execute();
        return $response->withHeader('Location', '/')->withStatus(302);
    }

    public function editForm(Request $request, Response $response, $args) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $args['id']);
        $stmt->execute();
        $user = $stmt->fetch();
        return $this->renderer->render($response, "alterar.html", ['user' => $user]);
    }

    public function update(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':id', $args['id']);
        $stmt->execute();
        return $response->withHeader('Location', '/')->withStatus(302);
    }

    public function delete(Request $request, Response $response, $args) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $args['id']);
        $stmt->execute();
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}
