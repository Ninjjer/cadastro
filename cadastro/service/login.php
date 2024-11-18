<?php

require_once '../controller/LoginController.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch($acao)
{
    case 'login':
        $loginController = new loginController();
        $loginController->login($_POST['email'], $_POST['senha']);
        break;
    
    default:
        include '../view/LoginView.php';
}