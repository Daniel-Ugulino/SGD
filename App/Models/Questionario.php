<?php

require_once dirname(__FILE__)."\..\..\Core\Conexao.php";

class Questionario
{

    private $conexao;
    private $conn;

    public $id;
    public $fk_pergunta;
    public $fk_asu;
    public $fk_consulta;
    public $resposta;
    public $obs;

    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("select * from questionario q JOIN perguntas pe on q.fk_pergunta = pe.id_pergunta");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getByid()
    {
        try {
            $stm = $this->conn->prepare("select * from questionario q JOIN perguntas pe on q.fk_pergunta = pe.id_pergunta where id_questionario = :id");
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
            $stm = $this->conexao->conectar()->prepare("Insert into questionario values(DEFAULT,:fk_asu,:fk_pergunta,:resposta,:obs,:fk_consulta");
            $stm->bindParam("fk_asu", $this->fk_asu);
            $stm->bindParam("fk_consulta", $this->fk_consulta);
            $stm->bindParam("fk_pergunta", $this->fk_pergunta);
            $stm->bindParam("resposta", $this->resposta);
            $stm->bindParam("obs", $this->obs);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Erro type: \n" . $e);
        }
    }

    public function update($column, $data)
    {
        try {
            $this->conexao->conectar();
            $stm = $this->conexao->conectar()->prepare("Update questionario set :column = (:data) where id_questionario = (:id)");
            $stm->bindParam("column", $column);
            $stm->bindParam("data", $data);
            $stm->bindParam("id", $this->id);
            $stm->execute();
        } catch (Exception $e) {
            echo ("Erro type: \n" . $e);
        }
    }

    public function search($column, $data)
    {
        try {
            $stm = $this->conn->prepare("select * from questionario where :column = :data");
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
            $stm = $this->conn->prepare("Update funcionario set ativo = false where id_funcionario = (:id)");
            $stm->bindParam("id", $this->id);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Erro type: \n" . $e);
        }
    }
}
