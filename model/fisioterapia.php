<?php
require "..//conexao.php";

class fisioterapia{
    
    private $conexao;
    private $conn;

    public $id;
    public $queixa;
    public $data_consulta;

    private function  __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }

    public function getAll()
    {
        $stm = $this->conn->prepare("select * from consulta_fisio");
        $stm->execute();
        $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById(){
        $stm = $this->conn->prepare("select id_consulta,fk_relatorio,resposta from consulta_fisio inner join questionario;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

}

?>