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
        $usuario = new Usuario($this->banco);
        $usuario->email = $email;

        $conexao = $this->banco->conectar();

        $stmt = $conexao->prepare($usuario->login());
        $stmt->bind_param("s", $usuario->email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0)
        {
            $stmt->bind_result($senhaArmazenada);
            $stmt->fetch();
 
            if (password_verify($senha, $senhaArmazenada))
            {
                echo "Login bem-sucedido!";
                include 'index.php';
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Email não encontrado.";
        }

        $stmt->close();
        $this->banco->fecharConexao();
    }
}