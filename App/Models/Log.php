<?php

require_once "../../Core/Conexao.php";

class Log
{
    private $conexao;
    private $conn;

    public $id;
    public $fk;
    public $registro;

    private function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll(){
        $stm = $this->conn->prepare("select * from log");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById(){
        $stm = $this->conn->prepare("select * from log where fk_user = :fk");
        $stm->bindParam(":fk", $this->fk);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert()
    {
        $stm = $this->conn->prepare("Insert into log values (DEFAULT,:user_fk,:registro)");
        $stm->bindParam(":user_fk", $this->fk);
        $stm->bindParam(":registro", $this->registro);
        return $stm->execute();
    }
}
