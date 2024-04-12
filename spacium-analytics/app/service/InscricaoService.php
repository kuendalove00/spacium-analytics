<?php

namespace app\Service;

use app\Repository\InscricaoRepository;

class InscricaoServices {

    private $inscricaoRepo = NULL;

    public function __construct()
    {
        $this->inscricaoRepo = new InscricaoRepository();
    }

    public function getAllInscricoes()
    {
        return $this->inscricaoRepo->selectAll();
    }

    public function getById($dados)
    {
        return $this->inscricaoRepo->selectById($dados);
    }

    public function addInscricao($dados) 
    {
        $res = $this->inscricaoRepo->insert($dados);
        if($res)
        {
            echo '<script>alert("Inscricao inserido com sucesso");</script>';
        }
    }

    public function updateInscricao($dados) {
        $res = $this->inscricaoRepo->update($dados);
        if($res){
            echo '<script>alert("Inscricao atualizado com sucesso");</script>';
        }
        return;
    }

    public function removeInscricao($dados) {
        $res = $this->inscricaoRepo->delete($dados);
        if($res){
            echo '<script>alert("Inscricao excluido com sucesso");</script>';
        }
        return;
    }
}