<?php 

class Questionario{

    private $conexao;
    private $conn;

    public $id;
    public $fk_asu;
    public $fk_pergunta;
    public $fk_consulta;
    public $resposta;
    public $obs;

    public function __construct()
    {
        $this->conexao = new conexao_banco();
        $this->conn = $this->conexao->conectar();
    }


    private function getAll(){
        $stm = $this->conn->prepare("select * from questionario q JOIN perguntas pe on q.fk_pergunta = pe.id_pergunta");
    }

    private function getAllAsu(){
    }

    private function getAllFisio(){

    }

    private function getByid(){

    }

    private function getByidAsu(){
        
    }

    private function getByidFisio(){
        
    }

    private function insert(){

    }

    private function update(){
        
    }
}
?>