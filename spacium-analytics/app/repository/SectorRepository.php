<?php

namespace app\Repository;

use database\Connection;
use PDO;
use PDOException;
use app\Model\Sector;

class SectorRepository {
    private $db;

    function __construct()
    {
        $this->db = Connection::getDbInstance();
    }

    public function selectAll(){
        $sectores = Array();
        $query = $this->db->prepare("SELECT * from sectores");
        $query->execute();
        $resultado = $query->fetchAll();

        foreach($resultado as $sector){
            $sectores[] = new Sector($sector['id'], $sector['nome'], $sector['descricao']);
        }

        return $sectores;
    }

    public function insert($dados)
    {
        try
        {
            $consulta = $this->db->prepare("INSERT INTO `sectores`(`nome`, `descricao`) VALUES (:nome,:descricao)");
            $consulta->bindparam(":nome", $dados->nome);
            $consulta->bindparam(":descricao", $dados->descricao);
            $consulta->execute();
        }
        catch(PDOException $e)
        {
            if(str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Sector com nome já existente na base de dados");</script>';
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
            $consulta =  $this->db->prepare("UPDATE sectores SET nome=:nome, descricao=:descricao");
            $consulta->binparam(":id", $dados->id);
            $consulta->binparam(":nome", $dados->nome);
            $consulta->binparam(":email", $dados->email);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($dados)
    {
        try {
            $consulta = $this->db->prepare("DELETE FROM sectores WHERE id=:id");
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