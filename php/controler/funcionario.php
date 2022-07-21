<?php
// require "../models/funcionario.php";
// require "../models/vacinas.php";
// require "../models/exame.php";
require_once "../models/atestados.php";

class funcionario_controler
{
    private $atestado;
    private $exame;
    private $vacinas;
    private $funcionario;
    private $id;

    function __construct()
    {
        $this->atestado = new atestado();
        // $this->exame = new exame();
        // $this->vacinas = new vacinas();
    }

    function getReport($id)
    {
       $this->atestado->id = $id;
       return $this->atestado->getById();
    }


    public function cad_vacinas()
    {
        # code...
    }     

    function cad_funcionario()
    {
        $data = $_POST;
        $data1 = json_encode($data);
        
        $this->atestado->fk = "x";
        $this->atestado->cid = "x";
        $this->atestado->data = "x";
        $this->atestado->qtd_dias = "x";
        $this->atestado->insert();
    }
}

$sla = new funcionario_controler();
$data = $sla->getReport(2);
echo(json_encode($data[0]));  