<?php

require_once "../App/Controllers/funcionario.php";
require_once "../App/Controllers/relatorio.php";
require_once "../App/Controllers/log.php";
require_once "../App/Controllers/user.php";

class router
{
    private $c_funcionario;
    private $c_relatorio;
    private $c_log;
    private $c_user;

    public function __construct()
    {
        $this->c_funcionario = new funcionario_controler()    
    }

    function get_url()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = strstr($uri, "Core");
        $url2 = strpbrk($url, "/");
        echo ($url2);
        switch ($url2) {
            case "/teste":
                echo ("a");
                break;

            default:
                echo ("erro 404");
                break;
        }
    }
}
