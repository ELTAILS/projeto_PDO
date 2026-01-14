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

//Editar
$editarId = $_POST['editar'] ?? 0;

if($editarId > 0){

    $editarDados = [
        'nome' => $_POST['nome'] ?? null,
        'email' => $_POST['email'] ?? null,
        'telefone' => $_POST['telefone'] ?? null
    ];

    $controller->atualizar($editarId,$editarDados);
    $controller->setTabela(true);

}

$dados = [
    'nome' => $_POST['nome'] ?? null,
    'email' => $_POST['email'] ?? null,
    'telefone' => $_POST['telefone'] ?? null
];

//criar
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller->store($dados);
    $controller->setTabela(true);
}

//deletar
if (isset($_GET['deletar'])) {
    $controller->delete((int) $_GET['deletar']);
    header("Location: index.php");
}