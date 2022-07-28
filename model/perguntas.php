<?php
include "../conexao.php";
class Perguntas{
    public $conexao;
    public $conn;

    private $id;
    private $pergunta;

    private function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll(){
        $stm = $this->conn->prepare("select * from perguntas");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById(){
        $stm = $this->conn->prepare("select * from perguntas where id_pergunta = :id");
        $stm->bindParam("id", $this->id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(){
        $stm = $this->conn->prepare("insert into pergunta values(DEFAULT,:id)");
        return $stm->execute();
    }

    public function update($column, $data)
    {
        $stm = $this->conn->prepare("update perguntas set :column = (:data) where id_pergunta = :id");
        $stm->bindParam("column",$column);
        $stm->bindParam("data", $data);
        $stm->bindParam("id", $this->id);
        return $stm->execute();
    }

}



?>