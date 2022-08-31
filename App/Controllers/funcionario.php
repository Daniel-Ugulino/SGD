<?php

require_once dirname(__FILE__) . "/../Models/Funcionario.php";
// require_once dirname(__FILE__) . "/../Models/Vacinas.php";
// require_once dirname(__FILE__) . "/../Models/Exame.php";
// require_once dirname(__FILE__) . "/../Models/Atestados.php";

class funcionario_controler
{
    private $error;
    private $funcionario_model;
    private $funcionarios;
    public function __construct()
    {
        $this->funcionario_model = new funcionario();
    }


    private function injection_analyze($string)
    {
        $string1 = htmlspecialchars($string);
        $string2 = preg_replace('/[\!@#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', "", $string1);
        $string3 = str_replace(["UPDATE", "DELETE", "DROP", "SELECT", "INSERT", "ALTER", "TABLE", "VIEW", "PROCEDURE", "CREATE", "DATABASE", "LIKE", "USE"], "", $string2);
        return $string3;
    }

    public function index()
    {
        if (isset($_POST['search']) == null || $_POST['search'] == "") {
            $this->funcionarios = $this->funcionario_model->getAll();
            if (isset($this->funcionarios)) {
                require dirname(__FILE__) . "/../Views/Funcionario/index.php";
            } else {
                require dirname(__FILE__) . "/../Views/Error/index.php";
            }
        }
    }

    public function cad_funcionario()
    {
        if (isset($_GET['id']) == false) {
            if ($_POST != null) {
                $data = json_decode(json_encode($_POST));

                // $this->funcionario_model->nome = $data->nome;
                // $this->funcionario_model->matricula = $data->matricula;
                // $this->funcionario_model->cpf = $data->cpf;
                // $this->funcionario_model->telefone = $data->telefone;
                // $this->funcionario_model->email = $data->email;
                // $this->funcionario_model->nascimento = $data->nascimento;
                // $this->funcionario_model->setor = $data->setor;
                // $this->funcionario_model->fator_rh = $data->fator_rh;

                $columns = array_keys((array)$data);
                foreach ($columns as $column) {
                    $this->funcionario_model->$column = $data->$column;
                }

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
            $this->funcionario_model->id = $_GET['id'];
            $data = $this->funcionario_model->getById();
        }
        require dirname(__FILE__) . "/../Views/Funcionario/form.php";
    }

    public function update_funcionario()
    {
        if (isset($_GET['id'])) {
            if ($_POST != null) {
                $data = json_decode(json_encode($_POST));
                $columns = array_keys((array)$data);
                foreach ($columns as $column) {
                    $column = $this->injection_analyze($column);
                    $this->funcionario_model->update($column, $data->$column);
                }
            }
        }
    }

    public function search_funcionario()
    {
        if (isset($_POST["search"])) {
            $data = json_decode((json_encode($_POST)));
            $column = $this->injection_analyze($data->column);
            $field = $this->injection_analyze($data->field);
            unset($this->funcionarios);
            $this->funcionarios = $this->funcionario_model->search($column, $field);
            if (isset($this->funcionarios)) {
                echo (json_encode($this->funcionarios));
            } else {
                require_once dirname(__FILE__) . "/../Views/Error/index.php";
            }
        }
    }
}
