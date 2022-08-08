<?php

require_once "controler/funcionario.php";
require_once "controler/relatorio.php";
require_once "controler/user.php";
require_once "controler/log.php";

class router
{
    
    public function __construct()
    {
        
    }

    function get_url()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = strstr($uri, "med");
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
