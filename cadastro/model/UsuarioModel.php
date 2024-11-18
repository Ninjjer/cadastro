<?php

class Usuario
{

    private $table = "usuario";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $endereco;
    public $data_nasc;

    public function __construct($bd)
    {
        $this->conexao = $bd;
    }

    public function getIdUsuario($id)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function cadastrar()
    {
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (nome, email, senha, endereco, data_nasc) VALUES (?,?,?,?,?);");
    
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $this->conexao->error);
        }
    
        $stmt->bind_param("sssss", $this->nome, $this->email, $this->senha, $this->endereco, $this->data_nasc);
    
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function login()
    {
        return "SELECT * FROM {$this->table} WHERE email = ? LIMIT 1";
        
    }

    public function ler()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->conexao->query($query);
    }

    public function atualizar()
    {
        $query = "UPDATE {$this->table} SET nome = {$this->nome}, email = {$this->email}, senha = {$this->senha}, data_nasc = {$this->data_nasc} WHERE id = {$this->id}";
    }

    public function deletar()
    {
        $query = "DELETE FROM {$this->table} WHERE id = {$this->id}";
        return $this->conexao->prepare($query);
    }
}