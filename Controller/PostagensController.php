<?php


class PostagensController
{

    public static function loginPage()
    {
        require_once __DIR__ . '/../View/login.php';
    }
    public static function verifyCredencials() {}
    public static function homePage()
    {
        require_once __DIR__ . '/../Model/PostagensModel.php';
        $model = new PostagensModel;
        $model->showApresentacaoOwner();
        require_once __DIR__ . '/../View/home.php';
    }
}
