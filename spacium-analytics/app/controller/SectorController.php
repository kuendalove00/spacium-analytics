<?php

namespace app\Controller;

use app\Service\SectorServices;


class SectorController {

    private $sectorServices = NULL;


    public function __construct()
    {
        $this->sectorServices = new SectorServices();

    }

    public function index()
    {
        $sectores = $this->sectorServices->getAllSectores();
        return Controller::view("sector/listagem", [$sectores]);
    }

    public function store($params)
    {
        $this->sectorServices->addSector($params);
    }

    public function delete($id) 
    {
        $this->sectorServices->removeSector($id);
        return $this->index();
    }


}