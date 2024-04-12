<?php

namespace app\Service;

use app\Repository\CriterioRepository;

class CriterioServices {

    private $criterioRepo = NULL;

    public function __construct()
    {
        $this->criterioRepo = new CriterioRepository();
    }

    public function getAllCriterios()
    {
        return $this->criterioRepo->selectAll();
    }

    public function addCriterio($dados) 
    {
        $res = $this->criterioRepo->insert($dados);
        if($res)
        {
            echo '<script>alert("Criterio inserido com sucesso");</script>';
        }
    }

    public function updateCriterio($dados) {
        $res = $this->criterioRepo->update($dados);
        if($res){
            echo '<script>alert("Criterio atualizado com sucesso");</script>';
        }
        return;
    }

    public function removeCriterio($dados) {
        $res = $this->criterioRepo->delete($dados);
        if($res){
            echo '<script>alert("Criterio excluido com sucesso");</script>';
        }
        return;
    }
}