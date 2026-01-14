<?php

namespace App\Repository;

use PDO;

class RepositoryUsuario {
    public function __construct(private PDO $pdo){}

    public function criarUsuario(string $nome, string $email, string $telefone): void {
        $sql = "INSERT INTO usuarios (nome,email,telefone) VALUES (:n,:e,:t)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':n',$nome);
        $stmt->bindValue(':e',$email);
        $stmt->bindValue(':t',$telefone);
        $stmt->execute();
    }

    public function buscarEmail(string $email): ?array {
        $sql = "SELECT email FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();
        
        $usuario = $stmt->fetch();
        return $usuario ?: null;
    }

    public function listarUsuarios(): array {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function deletarUsuario(int $id): void {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function atualizarUsuario(int $id,string $nome,string $email,string $telefone): void {
        $sql = "UPDATE usuarios SET nome = :n, email = :e, telefone = :t WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':n', $nome);
        $stmt->bindValue(':e', $email);
        $stmt->bindValue(':t', $telefone);
        $stmt->execute();
    }

}