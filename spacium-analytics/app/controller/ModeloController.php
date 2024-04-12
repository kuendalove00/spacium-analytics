<?php

namespace app\Controller;

use app\Service\ModeloServices;


class ModeloController {

    private $modeloServices = NULL;


    public function __construct()
    {
        $this->modeloServices = new ModeloServices();

    }

    public function index()
    {
        $modelos = $this->modeloServices->getAllModelos();
        return Controller::view("modelo/listagem", [$modelos]);
    }

    public function store($params)
    {
        $this->modeloServices->addModelo($params);
    }

    public function delete($id) 
    {
        $this->modeloServices->removeModelo($id);
        return $this->index();
    }


}