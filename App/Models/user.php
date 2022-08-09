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

    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        try {
            $stm = $this->conn->prepare("Select * from user");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function getById()
    {
        try {
            $stm = $this->conn->prepare("select * from user where id_user = :id");
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
            $stm = $this->conn->prepare("Insert into user values(DEFAULT,:id,:username,:password,:cargo,:cpf,:email,true)");
            $stm->bindParam("username", $this->username);
            $stm->bindParam("password", $this->password);
            $stm->bindParam("cargo", $this->cargo);
            $stm->bindParam("cpf", $this->cpf);
            $stm->bindParam("emal", $this->email);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }

    public function update($column, $data)
    {
        try {
            $stm = $this->conn->prepare("Update user set :column = (:data) where = id_user :id");
            $stm->bindParam("column", $column);
            $stm->bindParam("column", $data);
            $stm->bindParam("column", $this->id);
            return $stm->execute();
        } catch (Exception $e) {
            echo ("Error type:\n" . $e);
        }
    }


    public function search($column, $data)
    {
        try {
            $stm = $this->conn->prepare("select * from user where :column = :data");
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
    }
}
