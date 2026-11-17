<?php

namespace App\Controller;

use App\Model\PostagensModel;

class PostagensController
{

    public static function loginPage()
    {
        require_once __DIR__ . '/../View/login.php';
    }
    public static function verifyCredencials() {}
    public static function homePage()
    {
        $model = new PostagensModel;
        $model->showApresentacaoOwner();
        $modelPostagens = new PostagensModel;
        $modelPostagens->showPostagens();
        $modelTopPostagens = new PostagensModel;
        $modelTopPostagens->showTopPostagens();
        require_once __DIR__ . '/../View/home.php';
    }
}
