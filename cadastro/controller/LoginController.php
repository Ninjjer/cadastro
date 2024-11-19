<?php

require_once '../server/database.php';
require_once '../model/UsuarioModel.php';

class LoginController
{
    protected $banco;

    public function __construct()
    {
        $this->banco = new Banco();
    } 
    
    public function login($email, $senha)
    {
        $conexao = $this->banco->conectar();

        $usuario = new Usuario($conexao);
        $usuario->email = $email;

        $stmt = $conexao->prepare($usuario->login());
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        $stmt->bind_param("s", $usuario->email);

        if ($stmt->execute())
        {
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {
                $stmt->bind_result($hashBD);

                if ($stmt->fetch())
                {
                    if (password_verify($senha, $hashBD))
                    {
                        echo "Login bem-sucedido!";
                        include '../index.php';
                    } 
                    else 
                    {
                        echo "Senha incorreta.";
                    }
                }
            } 
            else
            {
                echo "Email não encontrado.";
            }
        } 
        else
        {
            echo "Erro ao executar a consulta: " . $stmt->error;
        }
        $stmt->close();
        $this->banco->fecharConexao();
    }
}