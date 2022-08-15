<?php

require_once dirname(__FILE__)."\..\..\Core\Conexao.php";

class Exame
{
    private $conexao;
    private $conn;

    public $id;
    public $fk;
    public $exame;
    public $lab;
    public $data;
    public $resultado;


    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("select * from exame_periodico");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }
    public function getById()
    {
        try {
            $stm = $this->conn->prepare("select id_exame,exame,laboratorio,data_exame,resultado from relatorio_funcionario r LEFT JOIN exame_periodico exa on r.fk_exame = exa.id_exame where r.fk_funcionario = :id");
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
            $this->conexao->conectar();
            $stm = $this->conexao->conectar()->prepare("Insert into exame_periodico values(DEFAULT,:fk_key,:exame,:laboratorio,:data_exame,:resultado");
            $stm->bindParam("fk_key", $this->fk);
            $stm->bindParam("exame", $this->exame);
            $stm->bindParam("laboratorio", $this->lab);
            $stm->bindParam("data_exame", $this->data);
            $stm->bindParam("resultado", $this->resultado);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }
    public function update($column, $data)
    {
        try {
            $this->conexao->conectar();
            $stm = $this->conexao->conectar()->prepare("Update exame_periodico set :column = (:data) where id_funcionario = (:id)");
            $stm->bindParam("column", $column);
            $stm->bindParam("data", $data);
            $stm->bindParam("id", $this->id);
            $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function search($column, $data)
    {
        try {
            $stm = $this->conn->prepare("select * from atestado where :column = :data");
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
            echo ("Error type:\n" . $e);
        }
    }
}
