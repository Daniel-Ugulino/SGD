<?php

require_once "../../Core/Conexao.php";

class fisioterapia
{
    private $conexao;
    private $conn;

    public $id;
    public $queixa;
    public $fk_funcionario;
    public $data_consulta;

    public function  __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("select * from fisioterapia");
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getAllResposta()
    {
        try {
            $stm = $this->conn->prepare("select * from r_fisioterapia");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getById()
    {
        try {
            $stm = $this->conn->prepare("select * from fisioterapia where fk_funcionario = :fk");
            $stm->bindParam("fk", $this->fk_funcionario);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getByIdResposta()
    {
        try {
            $stm = $this->conn->prepare("select * from r_fisioterapia where :column = :id");
            $stm->bindParam("id", $this->id);
            $stm->bindParam("column", $column);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function insert()
    {
        try {
            $stm = $this->conn->prepare("inser into fisioterapia values('DEFAULT,:queixa,now(),:fk_funcionario')");
            $stm->bindParam(":queixa", $this->queixa);
            $stm->bindParam(":fk_funcionario", $this->fk_funcionario);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }
    
    public function update($column, $data)
    {
        try {
            $stm = $this->conn->prepare("Update fisioterapia set :column = (:data) where id_conuslta = (:id)");
            $stm->bindParam("column", $column);
            $stm->bindParam("data", $data);
            $stm->bindParam("id", $this->id);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function delete()
    {
        try {
        } catch (Exception $e) {
            echo ("Erro type: \n" . $e);
        }
    }
}
