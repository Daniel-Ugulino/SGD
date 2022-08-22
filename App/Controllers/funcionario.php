<?php

require_once dirname(__FILE__) . "/../Models/Funcionario.php";
require_once dirname(__FILE__) . "/../Models/Vacinas.php";
require_once dirname(__FILE__) . "/../Models/Exame.php";
require_once dirname(__FILE__) . "/../Models/Atestados.php";

class funcionario_controler
{
    private $error;
    private $funcionario_model;

    public function __construct()
    {
        $this->funcionario_model = new funcionario();
    }

    public function index()
    {
        $funcionarios = $this->funcionario_model->getAll();
        if (isset($funcionarios)) {
            require_once dirname(__FILE__) . "/../Views/Funcionario/index.php";
        } else {
            require_once dirname(__FILE__) . "/../Views/Error/index.php";
        }
    }

    public function cad_funcionario()
    {
        if (isset($_GET['id']) == false) {
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

                try {
                    $this->funcionario_model->insert();
                } catch (Exception $e) {
                    $this->error = $e;
                    require_once dirname(__FILE__) . "/../Views/Error/index.php";
                }
            }
        }
        require_once dirname(__FILE__) . "/../Views/Funcionario/form.php";
    }

    public function get_funcionario()
    {
        if (isset($_GET['id'])) {
            $this->funcionario_model->id_funcionario = $_GET['id'];
            $data = $this->funcionario_model->getById();
        }
        require dirname(__FILE__) . "/../Views/Funcionario/form.php";
    }

    public function update_funcionario()
    {
        if (isset($_GET['id'])) {
            if ($_POST != null) {
                echo ("update");
                // $data = new stdClass();
                $data = json_decode(json_encode($_POST));
                
                var_dump(($data));
                 // echo (json_decode(get_class_vars($data)));

                // foreach ($data as $data) {
                // }

                /*$class_vars = get_class_vars($data);
                echo(var_dump($class_vars));
                foreach ($class_vars as $name => $value) {
                    echo "$name : $value\n";
                }*/
            }
            // $data = $this->funcionario_model->update();
        }
    }
}
