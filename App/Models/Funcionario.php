<?php

require_once "../../Core/Conexao.php";

class funcionario
{
    private $conexao;
    private $conn;

    public $id_funcionario;
    public $nome;
    public $matricula;
    public $cpf;
    public $telefone;
    public $email;
    public $setor;
    public $fator_rh;

    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("select * from funcionario where ativo = true");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }
    
    public function getById()
    {
        try {
            $stm = $this->conn->prepare("select * from funcionario where id_funcionario = :id and ativo = true");
            $stm->bindParam("id", $this->id);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function insert()
    {
        try {
            $stm = $this->conn->prepare("Insert into funcionario values(DEFAULT,:name,:matricula,:cpf,:telefone,:email,:setor,now(),:fator_rh,true,now());");
            $stm->bindParam("name", $this->nome);
            $stm->bindParam("matricula", $this->matricula);
            $stm->bindParam("cpf", $this->cpf);
            $stm->bindParam("telefone", $this->telefone);
            $stm->bindParam("email", $this->email);
            $stm->bindParam("setor", $this->setor);
            $stm->bindParam("fator_rh", $this->fator_rh);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function update($column, $data)
    {
        try {
            $stm = $this->conn->prepare("Update funcionario set :column = (:data) where id_funcionario = (:id)");
            $stm->bindParam("column", $column);
            $stm->bindParam("data", $data);
            $stm->bindParam("id", $this->id);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function search($column, $data)
    {
        try {
            $stm = $this->conn->prepare("select * from funcionario where :column = :data");
            $stm->bindParam("column", $column);
            $stm->bindParam("data", $data);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function delete()
    {
        try {
            $stm = $this->conn->prepare("Update funcionario set ativo = false where id_funcionario = (:id)");
            $stm->bindParam("id", $this->id);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Erro type: \n" . $e);
        }
    }
}
