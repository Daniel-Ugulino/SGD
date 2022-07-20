<?php
class vacinas
{
    private $conexao = new conexao_banco();
    function getAll()
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("select * from vacinas");
        $stm->execute();
        $dados = $stm->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }
    function get($id)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("select id_vacinas,tipo,dose,data from relatorio_funcionario r LEFT JOIN vacinas vac on r.fk_vacina = vac.id_vacinas where r.fk_funcionario = :id");
        $stm->bindParam("id", $id);
        $stm->execute();
        $dados = $stm->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }
    function insert($data)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("Insert into vacinas values(DEFAULT,:fk,:tipo,:dose,now();");
        $stm->bindParam("fk", $data->fk_funcionario);
        $stm->bindParam("tipo", $data->tipo);
        $stm->bindParam("dose", $data->dose);
        $stm->execute();
    }
    function update($column, $data, $id)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $conexao->conectar()->prepare("Update vacinas set :column = (:data) where id_vacinas = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $id);
        $stm->execute();
    }
    function delete()
    {
    }
}
