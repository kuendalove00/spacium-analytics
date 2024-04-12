<?php

namespace app\Repository;

use database\Connection;
use PDO;
use PDOException;
use app\Model\Integrantes;

class IntegrantesRepository {
    private $db;

    function __construct()
    {
        $this->db = Connection::getDbInstance();
    }

    public function selectAll(){
        $integrantes = Array();
        $query = $this->db->prepare("SELECT * from integrantes");
        $query->execute();
        $resultado = $query->fetchAll();

        foreach($resultado as $integrante){
            $integrantes[] = new Integrantes($integrante['id'], $integrante['MVP'], $integrante['idv'], $integrante['impacto_social'], $integrante['inovacao']);
        }

        return $integrantes;
    }

    public function insert($dados)
    {
        try
        {
            $consulta = $this->db->prepare("INSERT INTO `integrantes`(`MVP`, `idv`, `impacto_social`, `inovacao`) VALUES (:mvp,:idv, :impacto_social, :inovacao)");
            $consulta->bindparam(":mvp", $dados->mvp);
            $consulta->bindparam(":idv", $dados->idv);
            $consulta->bindparam(":impacto_social", $dados->impacto_social);
            $consulta->bindparam(":inovacao", $dados->inovacao);
            $consulta->execute();
        }
        catch(PDOException $e)
        {
            if(str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Integrantes com nome já existente na base de dados");</script>';
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
            $consulta =  $this->db->prepare("UPDATE integrantes SET nome=:nome WHERE id=:id");
            $consulta->binparam(":id", $dados->id);
            $consulta->bindparam(":nome", $dados->nome);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($dados)
    {
        try {
            $consulta = $this->db->prepare("DELETE FROM integrantes WHERE id=:id");
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