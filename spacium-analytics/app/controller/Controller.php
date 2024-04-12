<?php

namespace app\Controller;

use Exception;

class Controller {

    public static function view(string $view, array $dados = []){
        $caminho = dirname(__FILE__,2)."/view";

        if(!file_exists($caminho.DIRECTORY_SEPARATOR.$view.".php"))
        {
            throw new Exception("A view {$view} não existe");
        }

        $array = $dados;

        require_once __DIR__ . "/../view/$view.php";
    }
}