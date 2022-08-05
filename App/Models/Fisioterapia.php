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

    private function  __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    private function getAll()
    {
        $stm = $this->conn->prepare("select * from fisioterapia");
        $stm->execute();
        $stm->fetchAll(PDO::FETCH_OBJ);
    }

    private function getById()
    {
        $stm = $this->conn->prepare("select * from resposta_fisioterapia where fk_funcionario = :fk");
        $stm->bindParam("fk", $this->fk_funcionario);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    private function insert()
    {
        $stm = $this->conn->prepare("inser into fisioterapia values('DEFAULT,:queixa,now(),:fk_funcionario')");
        $stm->bindParam(":queixa", $this->queixa);
        $stm->bindParam(":fk_funcionario", $this->fk_funcionario);
        return $stm->execute();
    }
    private function update($column, $data)
    {
        $stm = $this->conn->prepare("Update fisioterapia set :column = (:data) where id_conuslta = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $this->id);
        return $stm->execute();
    }
}
