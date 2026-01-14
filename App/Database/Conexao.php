<?php

namespace App\Database;

use PDO;
use PDOException;

final class Conexao  {

    private PDO $pdo;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=pdo_estudos;charset=utf8mb4";
        $usuario = 'root';
        $senha = '';
        $opcoes = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->pdo = new PDO($dsn,$usuario,$senha,$opcoes);
        }catch(PDOException) {
            throw new PDOException("Erro na conexão com o banco de dados!");
        }
    }

    public function getPdo(): PDO {
        return $this->pdo;
    }
}