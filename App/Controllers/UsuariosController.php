<?php

namespace App\Controllers;

use App\Services\ServiceUsuario;
use Exception;

class UsuariosController {
    private bool $tabela = false;
    public function __construct(private ServiceUsuario $service) {}

    public function index(): void {
        $usuarios = $this->service->listar();
        $this->tabela = true;
        require __DIR__ . "/../Views/TabelaUsuaraios.php";
    }


    public function store(array $dados): void {
        try {
            $this->service->criar($dados);
            $usuarios = $this->service->listar();
            require __DIR__ . '/../Views/TabelaUsuaraios.php';
        } catch (Exception $e){
            $erro = $e->getMessage();
            $usuarios = $this->service->listar();
            $this->tabela = true;            
            require __DIR__ . '/../Views/TabelaUsuaraios.php';
        }
    }

    public function delete(int $id): void {
        $this->service->deletar($id);
    }

    public function atualizar(int $id, array $dados): void {
        try {
            $this->service->atualizar($id, $dados);
        } catch (Exception $e) {
            $erro = $e->getMessage();
            $usuarios = $this->service->listar();
            $this->tabela = true;
        }
    }

    public function getTabela(): bool {
        return $this->tabela;
    }

    public function setTabela(bool $tabela): void {
        $this->tabela = $tabela;
    }

}