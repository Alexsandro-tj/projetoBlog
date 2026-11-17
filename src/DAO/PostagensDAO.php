<?php

namespace App\DAO;

use PDO;
use PDOException;

class PostagensDAO
{

    public $conexao;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        try {
            $dsn = "mysql:host={$host};port=$port;dbname=$db";

            $option = [

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conexao = new PDO($dsn, $user, $pass, $option);
        } catch (PDOException $e) {
            echo "Erro de sistema: " . $e->getMessage() . $e->getCode();
        }
    }

    public function selectOwnerBlog()
    {
        try {
            $sql = "SELECT * FROM t_apres";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            echo json_encode(["Erro" => "Informações Não Encontradas!"], JSON_UNESCAPED_UNICODE) . http_response_code(404);
        }
    }
    public function selectT_Post()
    {
        try {
            $sql = "SELECT * FROM t_post";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            $message = json_encode(["Erro" => "Postagens Não Econtradas!"], JSON_UNESCAPED_UNICODE) . http_response_code(404);
            return $message;
        }
    }
    public function selectTop5()
    {
        try {
            $sql = "SELECT * FROM t_top5";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            $message = json_encode(["Erro" => "Postagens Não Econtradas!"], JSON_UNESCAPED_UNICODE) . http_response_code(404);
            return $message;
        }
    }
}
