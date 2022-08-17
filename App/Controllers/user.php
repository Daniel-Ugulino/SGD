<?php

require_once dirname(__FILE__) . "\..\Models\User.php";


class user_controller
{

    private $user_model;
    private $error;

    public function __construct()
    {
        $this->user_model = new User();
    }

    public function create_user()
    {
        if ($_POST != null) {
            $data = json_decode(json_encode($_POST));
            echo(json_encode($data));
            $enc_password = password_hash($data->password, PASSWORD_DEFAULT);
            $this->user_model->username = $data->username;
            $this->user_model->password = $enc_password;
        }
        
        if ($this->error != "") {
            $this->user_model->insert();
        } else {
            $this->error = $this->user_model->insert();
            require_once dirname(__FILE__) . "\..\Views\Error\index.php";
        }

        require_once dirname(__FILE__) . "\..\Views\User\cadastro.php";
    }


    function login()
    {
        if ($_POST != null) {
            $data = json_decode(json_encode($_POST));
            $password = password_hash($data->password, PASSWORD_DEFAULT);
            echo ($password);
        }
        require_once dirname(__FILE__) . "\..\Views\User\index.php";
    }
}
