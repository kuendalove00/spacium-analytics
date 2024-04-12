<?php

namespace app\Service;

use app\Repository\SectorRepository;

class SectorServices {

    private $sectorRepo = NULL;

    public function __construct()
    {
        $this->sectorRepo = new SectorRepository();
    }

    public function getAllSectores()
    {
        return $this->sectorRepo->selectAll();
    }

    public function addSector($dados) 
    {
        $res = $this->sectorRepo->insert($dados);
        if($res)
        {
            echo '<script>alert("Logado com sucesso");</script>';
        }
    }

    public function updateSector($dados) {
        $res = $this->sectorRepo->update($dados);
        if($res){
            echo '<script>alert("Sector atualizado com sucesso");</script>';
        }
        return;
    }

    public function removeSector($dados) {
        $res = $this->sectorRepo->delete($dados);
        if($res){
            echo '<script>alert("Sector excluido com sucesso");</script>';
        }
        return;
    }

}