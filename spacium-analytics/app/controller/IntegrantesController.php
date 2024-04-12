<?php

namespace app\Controller;

use app\Service\IntegrantesServices;


class IntegrantesController {

    private $integrantesServices = NULL;


    public function __construct()
    {
        $this->integrantesServices = new IntegrantesServices();

    }

    public function index()
    {
        return $this->integrantesServices->getAllIntegrantes();
    }

    public function store($params)
    {
        $this->integrantesServices->addIntegrante($params);
    }

    public function delete($id) 
    {
        $this->integrantesServices->removeIntegrante($id);
    }


}