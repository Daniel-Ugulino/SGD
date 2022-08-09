<?php

require_once "../../Core/Conexao.php";

class Perguntas
{

    public $conexao;
    public $conn;

    private $id;
    private $pergunta;

    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("select * from perguntas");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getById()
    {
        try {
            $stm = $this->conn->prepare("select * from perguntas where id_pergunta = :id");
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
            $stm = $this->conn->prepare("insert into pergunta values(DEFAULT,:pergunta)");
            $stm->bindParam("id", $this->pergunta);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function update($column, $data)
    {
        try{
        $stm = $this->conn->prepare("update perguntas set :column = (:data) where id_pergunta = :id");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $this->id);
        return $stm->execute();}
        catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }


    public function search($column, $data)
    {
        try {
            $stm = $this->conn->prepare("select * from perguntas where :column = :data");
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
