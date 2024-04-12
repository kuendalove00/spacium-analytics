<?php

namespace app\Controller;

use app\Service\CriterioServices;


class CriterioController {

    private $criterioServices = NULL;


    public function __construct()
    {
        $this->criterioServices = new CriterioServices();

    }

    public function index()
    {
        $modelos = $this->criterioServices->getAllCriterios();
        return Controller::view("modelo/listagem", [$modelos]);
    }

    public function store($params)
    {
        $this->criterioServices->addCriterio($params);
    }

    public function delete($id) 
    {
        $this->criterioServices->removeCriterio($id);
        return $this->index();
    }


}