<?php

namespace app\Repository;

use database\Connection;
use PDO;
use PDOException;
use app\Model\Inscricao;

class InscricaoRepository {
    private $db;

    function __construct()
    {
        $this->db = Connection::getDbInstance();
    }

    public function selectAll(){
        $inscricoes = Array();
        $query = $this->db->prepare("SELECT * from inscricoes");
        $query->execute();
        $resultado = $query->fetchAll();

        foreach($resultado as $inscricao){
            $inscricoes[] = new Inscricao($inscricao['id'], $inscricao['MVP'], $inscricao['idv'], $inscricao['impacto_social'], $inscricao['inovacao']);
        }

        return $inscricoes;
    }

    public function selectById($dados)
    {
        $consulta = $this->db->prepare("SELECT * from usuarios WHERE id=:id");
        $consulta->bindparam(":id", $dados->id);
        $consulta->execute();
        $inscricao = $consulta->fetch();
        return new Inscricao($inscricao['id'], $inscricao['nome'], $inscricao['email']);
    }

    public function insert($dados)
    {
        try
        {
            $consulta = $this->db->prepare("INSERT INTO `inscricoes`(`MVP`, `idv`, `impacto_social`, `inovacao`) VALUES (:mvp,:idv, :impacto_social, :inovacao)");
            $consulta->bindparam(":mvp", $dados->mvp);
            $consulta->bindparam(":idv", $dados->idv);
            $consulta->bindparam(":impacto_social", $dados->impacto_social);
            $consulta->bindparam(":inovacao", $dados->inovacao);
            $consulta->execute();
        }
        catch(PDOException $e)
        {
            if(str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Inscricao com nome já existente na base de dados");</script>';
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
            $consulta =  $this->db->prepare("UPDATE inscricoes SET nome=:nome WHERE id=:id");
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
            $consulta = $this->db->prepare("DELETE FROM inscricoes WHERE id=:id");
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