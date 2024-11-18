<?php

require_once '../controller/UsuarioController.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch($acao)
{
    case 'cadastrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioController = new UsuarioController();
            $usuarioController->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['endereco'], $_POST['data_nasc']);
        } else {
            echo "Método de requisição inválido.";
        }
        break;
    
    default:
        include '../view/UsuarioView.php';
}