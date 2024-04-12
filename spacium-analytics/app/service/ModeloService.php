<?php

namespace app\Service;

use app\Repository\ModeloRepository;

class ModeloServices {

    private $modeloRepo = NULL;

    public function __construct()
    {
        $this->modeloRepo = new ModeloRepository();
    }

    public function getAllModelos()
    {
        return $this->modeloRepo->selectAll();
    }

    public function addModelo($dados) 
    {
        $res = $this->modeloRepo->insert($dados);
        if($res)
        {
            echo '<script>alert("Modelo inserido com sucesso");</script>';
        }
    }

    public function updateModelo($dados) {
        $res = $this->modeloRepo->update($dados);
        if($res){
            echo '<script>alert("Modelo atualizado com sucesso");</script>';
        }
        return;
    }

    public function removeModelo($dados) {
        $res = $this->modeloRepo->delete($dados);
        if($res){
            echo '<script>alert("Modelo excluido com sucesso");</script>';
        }
        return;
    }
}