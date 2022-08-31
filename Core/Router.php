<?php

require_once "../App/Controllers/Funcionario.php";
require_once "../App/Controllers/relatorio.php";
require_once "../App/Controllers/log.php";
require_once "../App/Controllers/user.php";

class Router
{
    private $funcionario_controller;
    private $user_controller;

    public function __construct()
    {
        $this->funcionario_controller = new funcionario_controler();
        $this->user_controller = new user_controller();
    }

    public function get_url()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = strstr($uri, "SGM");
        $url2 = strpbrk($url, "/");
        switch ($url2) {
            case "/teste":
                echo ("a");
                break;
            case "/funcionarios/form":
                $this->funcionario_controller->get_funcionario();
                $this->funcionario_controller->cad_funcionario();
                $this->funcionario_controller->update_funcionario();
                break;
            case "/funcionarios":
                $this->funcionario_controller->index();
                $this->funcionario_controller->search_funcionario();
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
