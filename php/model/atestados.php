<?php

class atestado
{
    private $conn_class = new conexao_banco();
    private $conn = $this->conn_class->conectar();

    public $id;
    public $fk;
    public $cid;
    public $data;
    public $qtd_dias;

    function getAll()
    {
        $stm = $this->conn->prepare("select * from atestado");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);;
    }
    function get()
    {
        $stm = $this->conn->prepare("select id_atestado,cid,data,qtd_dias from relatorio_funcionario r LEFT JOIN atestado ats on r.fk_atestado = ats.id_atestado where r.fk_funcionario = :id");
        $stm->bindParam("id", $this->id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);;
    }
    function insert()
    {
        $stm = $this->conn->prepare("Insert into atestado values (DEFAULT,:fk,:cid,:data,:qtd_dias)");
        $stm->bindParam("fk", $this->fk);
        $stm->bindParam("cid", $this->cid);
        $stm->bindParam("data", $this->data);
        $stm->bindParam("qtd_dias", $this->qtd_dias);
        return $stm->execute();
    }
    function update($column, $data, $id)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("Update atestado set :column = (:data) where id_atestado = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $id);
        return $stm->execute();
    }
    function delete()
    {
    }
}
