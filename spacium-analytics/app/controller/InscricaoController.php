<?php

namespace app\Controller;

use app\Service\InscricaoServices;


class ModeloController {

    private $inscricaoServices = NULL;


    public function __construct()
    {
        $this->inscricaoServices = new InscricaoServices();

    }

    public function index()
    {
        $inscricoes = $this->inscricaoServices->getAllInscricoes();
        return Controller::view("inscricao/listagem", [$inscricoes]);
    }

    public function show($id)
    {
        $inscricao = $this->inscricaoServices->getById($id);
        return Controller::view("inscricao/detalhes", [$inscricao]);
    }

    public function store($params)
    {
        $this->inscricaoServices->addInscricao($params);
    }

    public function delete($id) 
    {
        $this->inscricaoServices->removeInscricao($id);
        return $this->index();
    }


}