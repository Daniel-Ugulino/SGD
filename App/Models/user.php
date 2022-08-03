<?php

require_once "../../Core/Conexao.php";

class User
{
    private $conexao;
    private $conn;

    public $id;
    public $username;
    public $password;
    public $cargo;
    public $cpf;
    public $emal;
    public $ativo;

    private function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        $stm = $this->conn->prepare("Select * from med_user");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById()
    {
        $stm = $this->conn->prepare("select * from med_user where id_user = :id");
        $stm->bindParam("id", $this->id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert()
    {
        $stm = $this->conn->prepare("Insert into med_user values(DEFAULT,:id,:username,:password,:cargo,:cpf,:email,true)");
        $stm->bindParam("username", $this->username);
        $stm->bindParam("password", $this->password);
        $stm->bindParam("cargo", $this->cargo);
        $stm->bindParam("cpf", $this->cpf);
        $stm->bindParam("emal",$this->email);
        return $stm->execute();
    }

    public function update($column,$data)
    {
        $stm = $this->conn->prepare("Update med_user set :column = (:data) where = id_user :id");
        $stm->bindParam("column",$column);
        $stm->bindParam("column",$data);
        $stm->bindParam("column",$this->id);
        return $stm->execute();
    }

    public function delete()
    {
    }
}
