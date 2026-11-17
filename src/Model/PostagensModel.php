<?php

namespace App\Model;

use App\DAO\PostagensDAO;

class PostagensModel
{
    public string $email, $pwd;
    public $registro;


    public function showApresentacaoOwner()
    {
        $dao = new PostagensDAO;
        $resultado = $dao->selectOwnerBlog();
        $this->registro = $resultado;
    }
    public function showPostagens()
    {
        $daoPostagens = new PostagensDAO;
        $resultadoPostagem = $daoPostagens->selectT_Post();
        $this->registro = $resultadoPostagem;
    }
    public function showTopPostagens()
    {
        $daoTopPostagens = new PostagensDAO;
        $resultadoTopPostagens = $daoTopPostagens->selectTop5();
        $this->registro = $resultadoTopPostagens;
        
    }
}
