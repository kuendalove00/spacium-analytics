<?php

namespace app\Repository;

use database\Connection;
use PDO;
use PDOException;
use app\Model\Modelo;

class ModeloRepository {
    private $db;

    function __construct()
    {
        $this->db = Connection::getDbInstance();
    }

    public function selectAll(){
        $modelos = Array();
        $query = $this->db->prepare("SELECT * from modelos");
        $query->execute();
        $resultado = $query->fetchAll();

        foreach($resultado as $modelo){
            $modelos[] = new Modelo($modelo['id'], $modelo['nome'], $modelo['descricao']);
        }

        return $modelos;
    }

    public function insert($dados)
    {
        try
        {
            $consulta = $this->db->prepare("INSERT INTO `modelos`(`nome`, `descricao`) VALUES (:nome,:descricao)");
            $consulta->bindparam(":nome", $dados->nome);
            $consulta->bindparam(":descricao", $dados->descricao);
            $consulta->execute();
        }
        catch(PDOException $e)
        {
            if(str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Modelo com nome já existente na base de dados");</script>';
            }else
            {
                echo $e->getMessage();
            }
        }

        return true;
    }

    public function update($dados)
    {
        try{
            $consulta =  $this->db->prepare("UPDATE modelos SET nome=:nome, descricao=:descricao WHERE id=:id");
            $consulta->binparam(":id", $dados->id);
            $consulta->binparam(":nome", $dados->nome);
            $consulta->binparam(":descricao", $dados->descricao);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($dados)
    {
        try {
            $consulta = $this->db->prepare("DELETE FROM modelos WHERE id=:id");
            $consulta->bindparam(":id", $dados->id);
            $consulta->execute();
            return true;
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

}