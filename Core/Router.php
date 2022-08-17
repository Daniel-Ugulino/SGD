<?php

require_once "../App/Controllers/Funcionario.php";
require_once "../App/Controllers/relatorio.php";
require_once "../App/Controllers/log.php";
require_once "../App/Controllers/user.php";

class Router
{
    private $funcionario_controller;
    private $c_relatorio;
    private $c_log;
    private $user_controller;

    public function __construct()
    {
        $this->funcionario_controller = new funcionario_controler();
        $this->user_controller = new user_controller();
    }

    public function get_url()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = strstr($uri, "med");
        $url2 = strpbrk($url, "/");
        switch ($url2) {
            case "/teste":
                echo ("a");
                break;
            case "/funcionarios/cadastro":
                $this->funcionario_controller->cad_funcionario();
                break;
            case "/funcionarios":
                $this->funcionario_controller->index();
                break;
            case "/login":
                $this->user_controller->create_user();
                break;
            default:
                echo ("erro 404");
                break;
        }
    }
}
