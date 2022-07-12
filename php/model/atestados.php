<?php

class atestado
{
    public $id;
    public $fk;
    public $cid;
    public $data;
    public $qtd_dias;
    private $conexao = new conexao_banco();
    private $stm = $this->conexao->conectar();

    function getAll()
    {
        $this->stm->prepare("select * from atestado");
        $this->stm->execute();
        return $this->stm->fetchAll(PDO::FETCH_OBJ);;
    }
    function get()
    {
        $this->stm->prepare("select id_atestado,cid,data,qtd_dias from relatorio_funcionario r LEFT JOIN atestado ats on r.fk_atestado = ats.id_atestado where r.fk_funcionario = :id");
        $this->stm->bindParam("id", $this->id);
        $this->stm->execute();
        return $this->stm->fetchAll(PDO::FETCH_OBJ);;
    }
    function insert($dados)
    {
        $this->stm->prepare("Insert into atestado values (DEFAULT,:fk,:cid,:data,:qtd_dias)");
        $this->stm->bindParam("fk", $this->fk);
        $this->stm->bindParam("cid", $this->cid);
        $this->stm->bindParam("data", $this->data);
        $this->stm->bindParam("qtd_dias", $this->qtd_dias);
        $this->stm->execute();
    }
    function update($column, $data, $id)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("Update atestado set :column = (:data) where id_atestado = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $id);
        $stm->execute();
    }
    function delete()
    {
    }
}
