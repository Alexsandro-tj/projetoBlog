<?php

require_once __DIR__ . '/../vendor/autoload.php';
/* $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
 */
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
            $this->conexao = new PDO($dsn, $user, $pass);

            $option = [

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
        } catch (PDOException $e) {
            echo "Erro de sistema: " . $e->getMessage() . $e->getCode();
        }
    }

    public function selectOwnerBlog()
    {
        $sql = "SELECT * FROM t_apres";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
