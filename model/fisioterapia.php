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
        $stm = $this->conn->prepare("
        select f.id_consulta,q.fk_relatorio,pe.pergunta,q.resposta,q.obs,f.queixa,f.data_consulta from questionario q 
        JOIN perguntas pe on q.fk_pergunta = pe.id_pergunta
        JOIN consulta_fisio f on  q.fk_consulta = f.id_consulta WHERE q.fk_consulta is not null
        ;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

}
