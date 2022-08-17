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
    private $error;
    private $atestado;
    private $exame;
    private $vacinas;
    private $funcionario_model;
    private $id;

    public function __construct()
    {
        $this->funcionario_model = new funcionario();
    }

    public function index(){
        $funcionarios = $this->funcionario_model->getAll();
        if (isset($funcionarios)){
            require_once dirname(__FILE__) ."\..\Views\Funcionario\index.php";
        }
        else{
            require_once dirname(__FILE__) ."\..\Views\Error\index.php";
        }
    }

    public function cad_funcionario()
    {
        if ($_POST != null) {
            $data = json_decode(json_encode($_POST));
            $this->funcionario_model->nome = $data->nome;
            $this->funcionario_model->matricula = $data->matricula;
            $this->funcionario_model->cpf = $data->cpf;
            $this->funcionario_model->telefone = $data->telefone;
            $this->funcionario_model->email = $data->email;
            $this->funcionario_model->nascimento = $data->nascimento;
            $this->funcionario_model->setor = $data->setor;
            $this->funcionario_model->fator_rh = $data->fator_rh;

            if ($this->error != "") {
                $this->funcionario_model->insert();
            } else {
                $this->error = $this->funcionario_model->insert();
                require_once dirname(__FILE__) . "\..\Views\Error\index.php";
            }
            
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
