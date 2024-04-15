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
            $inscricoes[] = new Inscricao($inscricao['id'], $inscricao['nome'], $inscricao['data_constituicao'], $inscricao['data_inscricao'], $inscricao['localizacao'], $inscricao['nif'], $inscricao['email'], $inscricao['telemovel'], $inscricao['website'], $inscricao['integrantes'], $inscricao['estado'], $inscricao['idv'], $inscricao['descricao'], $inscricao['sector'], $inscricao['modelo'], $inscricao['participacoes'], $inscricao['montante'], $inscricao['grau_inovacao'], $inscricao['escalabilidade'], $inscricao['impacto'], $inscricao['fundos_obtidos'], $inscricao['tecnologia'], $inscricao['maturidade']);
        }

        return $inscricoes;
    }

    public function selectById($dados)
    {
        $consulta = $this->db->prepare("SELECT * from usuarios WHERE id=:id");
        $consulta->bindparam(":id", $dados->id);
        $consulta->execute();
        $inscricao = $consulta->fetch();
        return new Inscricao($inscricao['id'], $inscricao['nome'], $inscricao['data_constituicao'], $inscricao['data_inscricao'], $inscricao['localizacao'], $inscricao['nif'], $inscricao['email'], $inscricao['telemovel'], $inscricao['website'], $inscricao['integrantes'], $inscricao['estado'], $inscricao['idv'], $inscricao['descricao'], $inscricao['sector'], $inscricao['modelo'], $inscricao['participacoes'], $inscricao['montante'], $inscricao['grau_inovacao'], $inscricao['escalabilidade'], $inscricao['impacto'], $inscricao['fundos_obtidos'], $inscricao['tecnologia'], $inscricao['maturidade']);
    }

    public function insert($dados)
    {
        try
        {
            $consulta = $this->db->prepare("INSERT INTO `inscricoes`(`nome`, `data_constituicao`, `nif`, `email`, `telemovel`, `website`, `localizacao`, `integrantes`, `estado`, `idv`, `descricao`, `sector`, `modelo`, `participacoes`, `montante`, `grau_inovacao`, `escalabilidade`, `impacto`, `fundos_obtidos`, `tecnologia`, `maturidade`, `data_inscricao`, `criado_aos`) 
            VALUES (':nome',':data_constituicao',':data_inscricao',':localizacao',':contacto',':email',':nif',':website',':descricao',':integrantes',':sector',':modelo',':estado',':idv',':participacoes',':montante',':grau_inovacao','escalabilidade','impacto','fundos_obtidos','tecnologias','maturidade')");
            $consulta->bindparam(":nome", $dados->nome);
            $consulta->bindparam(":data_constituicao",$dados->data_constituicao) ;
            $consulta->bindparam(":data_inscricao", $dados->data_inscricao) ;
            $consulta->bindparam(":localizacao", $dados->localizacao) ;
            $consulta->bindparam(":contacto", $dados->contacto) ;
            $consulta->bindparam(":email", $dados->email) ;
            $consulta->bindparam(":nif", $dados->nif) ;
            $consulta->bindparam(":website", $dados->website) ;
            $consulta->bindparam(":descricao", $dados->descricao) ;
            $consulta->bindparam(":integrantes", $dados->integrantes) ;
            $consulta->bindparam(":sector", $dados->sector) ;
            $consulta->bindparam(":modelo", $dados->modelo) ;
            $consulta->bindparam(":estado", $dados->estado) ;
            $consulta->bindparam(":idv", $dados->idv) ;
            $consulta->bindparam(":participacoes", $dados->participacoes) ;
            $consulta->bindparam(":montante", $dados->montante) ;
            $consulta->bindparam(":grau_inovacao", $dados->grau_inovacao) ;
            $consulta->bindparam(":escalabilidade", $dados->escalabilidade) ;
            $consulta->bindparam(":impacto", $dados->impacto) ;
            $consulta->bindparam(":fundos_obtidos", $dados->fundos_obtidos);
            $consulta->bindparam(":tecnologias", $dados->tecnologia) ;
            $consulta->bindparam(":maturidade", $dados->maturidade) ;
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
            $consulta =  $this->db->prepare("UPDATE `inscricoes` SET `nome`=:nome,`data_constituicao`=:data_constituicao,`nif`=:nif,`email`=:email,`telemovel`=:telemovel,`website`=:website,`localizacao`=:localizacao,`integrantes`=:integrantes,`estado`=:estado,`idv`=:idv,`descricao`=:descricao,`sector`=':sector',`modelo`=':modelo',`participacoes`=':participacoes',`montante`=':montante',`grau_inovacao`=':grau_inovacao',`escalabilidade`=':escalabilidade',`impacto`=':impacto',`fundos_obtidos`=':fundos_obtidos',`tecnologia`=':tecnologia',`maturidade`=':maturidade',`data_inscricao`=':data_inscricao' WHERE id=:id");
            $consulta->bindparam(":id", $dados->id);
            $consulta->bindparam(":nome", $dados->nome);
            $consulta->bindparam(":data_constituicao",$dados->data_constituicao) ;
            $consulta->bindparam(":data_inscricao", $dados->data_inscricao) ;
            $consulta->bindparam(":localizacao", $dados->localizacao) ;
            $consulta->bindparam(":contacto", $dados->contacto) ;
            $consulta->bindparam(":email", $dados->email) ;
            $consulta->bindparam(":nif", $dados->nif) ;
            $consulta->bindparam(":website", $dados->website) ;
            $consulta->bindparam(":descricao", $dados->descricao) ;
            $consulta->bindparam(":integrantes", $dados->integrantes) ;
            $consulta->bindparam(":sector", $dados->sector) ;
            $consulta->bindparam(":modelo", $dados->modelo) ;
            $consulta->bindparam(":estado", $dados->estado) ;
            $consulta->bindparam(":idv", $dados->idv) ;
            $consulta->bindparam(":participacoes", $dados->participacoes) ;
            $consulta->bindparam(":montante", $dados->montante) ;
            $consulta->bindparam(":grau_inovacao", $dados->grau_inovacao) ;
            $consulta->bindparam(":escalabilidade", $dados->escalabilidade) ;
            $consulta->bindparam(":impacto", $dados->impacto) ;
            $consulta->bindparam(":fundos_obtidos", $dados->fundos_obtidos);
            $consulta->bindparam(":tecnologias", $dados->tecnologia) ;
            $consulta->bindparam(":maturidade", $dados->maturidade) ;
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