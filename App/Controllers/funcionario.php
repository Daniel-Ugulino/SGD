<?php

require_once dirname(__FILE__) . "\..\Models\Funcionario.php";
require_once dirname(__FILE__) . "\..\Models\Vacinas.php";
require_once dirname(__FILE__) . "\..\Models\Exame.php";
require_once dirname(__FILE__) . "\..\Models\Atestados.php";

class report_controller
{
}

class funcionario_controler
{
    private $atestado;
    private $exame;
    private $vacinas;
    private $funcionario;
    private $id;

    public function __construct()
    {
        $this->funcionario = new funcionario();
        $this->funcionario->getAll();
    }

    public function index(){
        $this->funcionario->getAll();
        require_once dirname(__FILE__) ."\..\Views\Funcionario\index.php";
    }

    public function cad_funcionario()
    {
        if ($_POST != null) {
            $data = json_decode(json_encode($_POST));
            echo(json_encode($data));
            $this->funcionario->nome = $data->nome;
            $this->funcionario->matricula = $data->matricula;
            $this->funcionario->cpf = $data->cpf;
            $this->funcionario->telefone = $data->telefone;
            $this->funcionario->email = $data->email;
            $this->funcionario->setor = $data->setor;
            $this->funcionario->fator_rh = $data->fator_rh;
            $this->funcionario->insert();
        }
        require_once dirname(__FILE__) . "\..\Views\Funcionario\cadastro.php";
    }
}


class atestado_controller
{
}

class vacinas_controller
{
}


class exame_controller
{
}
