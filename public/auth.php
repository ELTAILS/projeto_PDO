<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Conexao;
use App\Repository\RepositoryUsuario;
use App\Services\ServiceUsuario;
use App\Controllers\UsuariosController;

$conexao = new Conexao();
$repository = new RepositoryUsuario($conexao->getPdo());
$service = new ServiceUsuario($repository);
$controller = new UsuariosController($service);

$dados = [
    'nome' => $_POST['nome'] ?? null,
    'email' => $_POST['email'] ?? null,
    'telefone' => $_POST['telefone'] ?? null
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller->store($dados);
    $controller->setTabela(true);
}

if (isset($_GET['deletar'])) {
    $controller->delete((int) $_GET['deletar']);
    header("Location: index.php");
}