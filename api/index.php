<?php

include_once __DIR__ . '/../Controller/PostagensController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/':
        PostagensController::homePage();
        break;

    case '/View/login':
        PostagensController::loginPage();
        break;

    case '/verifyLogin':
        PostagensController::verifyCredencials();
        break;
    default:
        echo '404 - NOT FOUND';
        break;
}
