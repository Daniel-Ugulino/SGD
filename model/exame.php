<?php

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


    private function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function get()
    {
        $stm = $this->conn->prepare("select * from exame_periodico");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public function getById()
    {
        $stm = $this->conn->prepare("select id_exame,exame,laboratorio,data_exame,resultado from relatorio_funcionario r LEFT JOIN exame_periodico exa on r.fk_exame = exa.id_exame where r.fk_funcionario = :id");
        $stm->bindParam("id", $this->id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public function insert()
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Insert into exame_periodico values(DEFAULT,:fk_key,:exame,:laboratorio,:data_exame,:resultado");
        $stm->bindParam("fk_key", $this->fk);
        $stm->bindParam("exame", $this->exame);
        $stm->bindParam("laboratorio", $this->lab);
        $stm->bindParam("data_exame", $this->data);
        $stm->bindParam("resultado", $this->resultado);
        return $stm->execute();
    }
    public function update($column, $data)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Update exame_periodico set :column = (:data) where id_funcionario = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $this->id);
        $stm->execute();
    }
    public function delete()
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Update exame_periodico set ativo = false where id_funcionario = (:id)");
        $stm->bindParam("id", $this->id);
        $stm->execute();
    }
}
