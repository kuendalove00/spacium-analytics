<?php

namespace app\Repository;

use database\Connection;
use PDO;
use PDOException;
use app\Model\Criterio;

class CriterioRepository {
    private $db;

    function __construct()
    {
        $this->db = Connection::getDbInstance();
    }

    public function selectAll(){
        $criterios = Array();
        $query = $this->db->prepare("SELECT * from criterios");
        $query->execute();
        $resultado = $query->fetchAll();

        foreach($resultado as $criterio){
            $criterios[] = new Criterio($criterio['id'], $criterio['MVP'], $criterio['idv'], $criterio['impacto_social'], $criterio['inovacao']);
        }

        return $criterios;
    }

    public function insert($dados)
    {
        try
        {
            $consulta = $this->db->prepare("INSERT INTO `criterios`(`MVP`, `idv`, `impacto_social`, `inovacao`) VALUES (:mvp,:idv, :impacto_social, :inovacao)");
            $consulta->bindparam(":mvp", $dados->mvp);
            $consulta->bindparam(":idv", $dados->idv);
            $consulta->bindparam(":impacto_social", $dados->impacto_social);
            $consulta->bindparam(":inovacao", $dados->inovacao);
            $consulta->execute();
        }
        catch(PDOException $e)
        {
            if(str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Criterio com nome já existente na base de dados");</script>';
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
            $consulta =  $this->db->prepare("UPDATE criterios SET nome=:nome, descricao=:descricao WHERE id=:id");
            $consulta->binparam(":id", $dados->id);
            $consulta->bindparam(":mvp", $dados->mvp);
            $consulta->bindparam(":idv", $dados->idv);
            $consulta->bindparam(":impacto_social", $dados->impacto_social);
            $consulta->bindparam(":inovacao", $dados->inovacao);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($dados)
    {
        try {
            $consulta = $this->db->prepare("DELETE FROM criterios WHERE id=:id");
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