<?php

require_once '../server/database.php';
require_once '../model/UsuarioModel.php';

class UsuarioController 

{
    public function cadastrar($nome, $email, $senha, $endereco, $data_nasc) 
    {
        $database = new Banco();
        $bd = $database->conectar();

        $usuario = new Usuario($bd);

        $usuario->nome = $nome;
        $usuario->email = $email;
        $usuario->senha = password_hash($senha, PASSWORD_DEFAULT);
        $usuario->endereco = $endereco;
        $usuario->data_nasc = $data_nasc;

        $resultado = $usuario->cadastrar();
    }
}