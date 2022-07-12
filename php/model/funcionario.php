<?php

class funcionario
{
    private $conexao = new conexao_banco();

    function getAll()
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("select * from funcionario where ativo = true");
        $stm->execute();
        $dados = $stm->fetchAll(PDO::FETCH_OBJ);
        return  $dados;
    }
    function getById($id)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("select * from funcionario where id_funcionario = :id and ativo = true");
        $stm->bindParam("id", $id);
        $stm->execute();
        $dados = $stm->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }
    function insert($dados)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Insert into funcionario values(DEFAULT,:name,:matricula,:cpf,:telefone,:email,:setor,now(),:fator_rh,true,now());");
        $stm->bindParam("name", $dados->username);
        $stm->bindParam("matricula", $dados->matricula);
        $stm->bindParam("cpf", $dados->cpf);
        $stm->bindParam("telefone", $dados->telefone);
        $stm->bindParam("email", $dados->email);
        $stm->bindParam("setor", $dados->setor);
        $stm->bindParam("fator_rh", $dados->fator_rh);
        $stm->execute();
    }
    function update($column, $data, $id)
    {
        $this->conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Update funcionario set :column = (:data) where id_funcionario = (:id)");
        $stm->bindParam("column", $column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $id);
        $stm->execute();
    }
    function delete($id)
    {
        $conexao = new conexao_banco();
        $conexao->conectar();
        $stm = $this->conexao->conectar()->prepare("Update funcionario set ativo = false where id_funcionario = (:id)");
        $stm->bindParam("id", $id);
        $stm->execute();
    }
}
