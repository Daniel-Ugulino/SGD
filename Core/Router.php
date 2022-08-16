<?php

require_once "../App/Controllers/Funcionario.php";
require_once "../App/Controllers/relatorio.php";
require_once "../App/Controllers/log.php";
require_once "../App/Controllers/user.php";

class Router
{
    private $funcionario;
    private $c_relatorio;
    private $c_log;
    private $c_user;

    public function __construct()
    {
        $this->funcionario = new funcionario_controler();
    }

    public function get_url()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = strstr($uri, "public");
        $url2 = strpbrk($url, "/");
        
        switch ($url2) {
            case "/teste":
                echo ("a");
                break;
            case "/funcionario/cadastro":
                $this->funcionario->cad_funcionario();
                break;
            case "/funcionario":
                $this->funcionario->index();
                break;
            default:
                echo ("erro 404");
                break;
        }
    }
}
