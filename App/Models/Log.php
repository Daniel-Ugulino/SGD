<?php

require_once "../../Core/Conexao.php";

class Log
{
    private $conexao;
    private $conn;

    public $id;
    public $fk;
    public $registro;

    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("select * from log");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getById()
    {
        try {
            $stm = $this->conn->prepare("select * from log where fk_user = :fk");
            $stm->bindParam(":fk", $this->fk);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function insert()
    {
        try {
            $stm = $this->conn->prepare("Insert into log values (DEFAULT,:user_fk,:registro)");
            $stm->bindParam(":user_fk", $this->fk);
            $stm->bindParam(":registro", $this->registro);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function search($column, $data)
    {
        try {
            $stm = $this->conn->prepare("select * from log where :column = :data");
            $stm->bindParam("column", $column);
            $stm->bindParam("data", $data);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
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
