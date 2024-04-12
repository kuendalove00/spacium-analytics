<?php

namespace app\Controller;

use app\Service\UsuarioServices;


class UsuarioController {

    private $usuarioServices = NULL;


    public function __construct()
    {
        $this->usuarioServices = new UsuarioServices();

    }

    public function signInUsuario($dados)
    {
        $res = $this->usuarioServices->signInUsuario($dados);
        if($res){
            return Controller::view("dashboard");
        }
    }

}