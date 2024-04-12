<?php

namespace app\Service;

use app\Repository\UsuarioRepository;

class UsuarioServices {

    private $usuarioRepo = NULL;

    public function __construct()
    {
        $this->usuarioRepo = new UsuarioRepository();
    }

    public function getAllUsuarios()
    {
        return $this->usuarioRepo->selectAll();
    }

    public function getUsuario($dados) 
    {
        return $this->usuarioRepo->selectById($dados);
    }

    public function signinUsuario($dados) {
        $res = $this->usuarioRepo->login($dados);
        if($res){
            echo '<script>alert("Logado com sucesso");</script>';
        }
        return;
    }

}