<?php

class Exame
{
    private $conexao = new conexao_banco();
    private $conn = $this->conexao->conectar();

    public $id;
    public $fk;
    public $exame;
    public $lab;
    public $data;
    public $resultado;

    function get()
    {
        $stm = $this->conn->prepare("select * from exame_periodico where ativo = true");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    function getById($id)
    {

        $stm = $this->conn->prepare("select id_exame,exame,laboratorio,data_exame,resultado from relatorio_funcionario r LEFT JOIN exame_periodico exa on r.fk_exame = exa.id_exame where r.fk_funcionario = :id");
        $stm->bindParam("id", $id);
        $stm->execute();
        $dados = $stm->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }
    function insert($dados)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Insert into exame_periodico values(DEFAULT,:fk_key,:exame,:laboratorio,:data_exame,:resultado");
        $stm->bindParam("fk_key", $dados->fk_key);
        $stm->bindParam("exame", $dados->exame);
        $stm->bindParam("laboratorio", $dados->laboratorio);
        $stm->bindParam("data_exame", $dados->data_exame);
        $stm->bindParam("resultado", $dados->resultado);
        return $stm->execute();
    }
    function update($column, $data, $id)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Update exame_periodico set :column = (:data) where id_funcionario = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $id);
        $stm->execute();
    }
    function delete($id)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Update exame_periodico set ativo = false where id_funcionario = (:id)");
        $stm->bindParam("id", $id);
        $stm->execute();
    }
}
