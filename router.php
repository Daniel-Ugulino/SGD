<?php

include "controler/funcionario.php";
include "controler/relatorio.php";
include "controler/user.php";
include "controler/log.php";

class router
{
    function get_url()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'],);
        $url = strstr(implode($uri), "php");
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
