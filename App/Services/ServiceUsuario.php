<?php

namespace App\Services;

use App\Repository\RepositoryUsuario;
use InvalidArgumentException;

class ServiceUsuario {
    public function __construct(private RepositoryUsuario $repository){}

    public function criar(array $dados): void {
        $nome = trim($dados['nome']);
        $email = filter_var($dados['email'], FILTER_VALIDATE_EMAIL);
        $telefone = preg_replace('/\D/', '', $dados['telefone']);

        if($nome === '' || !$email || strlen($telefone) !== 9){
            throw new InvalidArgumentException("Preencha todos os dados corretamente!");
        }

        if($this->repository->buscarEmail($email)){
            throw new InvalidArgumentException("Esse email já está cadatrado!");
        }

        $this->repository->criarUsuario($nome,$email,$telefone);
    }

    public function listar(): array {
        return $this->repository->listarUsuarios();
    }

    public function deletar(int $id): void {
        $this->repository->deletarUsuario($id);
    }

    public function atualizar(int $id,array $dados): void {
        $nome = trim($dados['nome']);
        $email = filter_var($dados['email'], FILTER_VALIDATE_EMAIL);
        $telefone = preg_replace('/\D/', '', $dados['telefone']);

        if($nome === '' || !$email || strlen($telefone) !== 9){
            throw new InvalidArgumentException("Preencha todos os dados corretamente!");
        }

        $this->repository->atualizarUsuario($id,$nome,$email,$telefone);
    }
}