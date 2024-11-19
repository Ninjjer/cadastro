<?php

class Banco

{
    const host = 'localhost';
    const banco = 'sqlserver';
    const usuario = 'root';
    const senha = '';

    public $conexao;

    public function conectar()

    {
        $this->conexao = new mysqli(self::host, self::usuario, self::senha, self::banco);

        if ($this->conexao->connect_error)
        {
            die("Erro de conexão: " . $this->conexao->connect_error);
        }

        return $this->conexao;
    }

    public function fecharConexao()
    {
        if ($this->conexao) {
            $this->conexao->close();
        }
    }
}
