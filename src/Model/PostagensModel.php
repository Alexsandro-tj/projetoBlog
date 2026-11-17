<?php
namespace App\Model;
use App\DAO\PostagensDAO;

class PostagensModel
{
    public string $email, $pwd;
    public $registro;


    public function showApresentacaoOwner()
    {

        require_once __DIR__ . '/../DAO/PostagensDAO.php';

        $dao = new PostagensDAO;
        $resultado = $dao->selectOwnerBlog();
        $this->registro = $resultado;
    }
}
