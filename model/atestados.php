<?php

include "../conexao.php";

class atestado
{
    private $conexao;
    private $conn;
    
    public $id;
    public $fk;
    public $cid;
    public $data;
    public $qtd_dias;

    private function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        $stm = $this->conn->prepare("select * from atestado");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public function getById()
    {
        $stm = $this->conn->prepare("select id_atestado,cid,data,qtd_dias from relatorio_funcionario r LEFT JOIN atestado ats on r.fk_atestado = ats.id_atestado where r.fk_funcionario = :id");
        $stm->bindParam("id", $this->id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public function insert()
    {
        $stm = $this->conn->prepare("Insert into atestado values (DEFAULT,:fk,:cid,:data,:qtd_dias)");
        $stm->bindParam("fk", $this->fk);
        $stm->bindParam("cid", $this->cid);
        $stm->bindParam("data", $this->data);
        $stm->bindParam("qtd_dias", $this->qtd_dias);
        return $stm->execute();
    }
    public function update($column, $data)
    {
        $stm = $this->conn->prepare("Update atestado set :column = (:data) where id_atestado = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $this->id);
        return $stm->execute();
    }

    // function delete()
    // {
    // }
}