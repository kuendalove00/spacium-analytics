<?php

namespace app\Service;

use app\Repository\IntegrantesRepository;

class IntegrantesServices {

    private $integrantesRepo = NULL;

    public function __construct()
    {
        $this->integrantesRepo = new IntegrantesRepository();
    }

    public function getAllIntegrantes()
    {
        return $this->integrantesRepo->selectAll();
    }

    public function addIntegrante($dados) 
    {
        $res = $this->integrantesRepo->insert($dados);
        if($res)
        {
            echo '<script>alert("Integrante inserido com sucesso");</script>';
        }
    }

    public function updateIntegrante($dados) {
        $res = $this->integrantesRepo->update($dados);
        if($res){
            echo '<script>alert("Integrante atualizado com sucesso");</script>';
        }
        return;
    }

    public function removeIntegrante($dados) {
        $res = $this->integrantesRepo->delete($dados);
        if($res){
            echo '<script>alert("Integrante excluido com sucesso");</script>';
        }
        return;
    }
}