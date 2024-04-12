<?php

namespace app\Repository;

use database\Connection;
use PDO;
use PDOException;
use app\Model\Usuario;

class UsuarioRepository {
    private $db;

    function __construct()
    {
        $this->db = Connection::getDbInstance();
    }

    public function selectAll(){
        $usuarios = Array();
        $query = $this->db->prepare("SELECT * from usuarios");
        $query->execute();
        $resultado = $query->fetchAll();

        foreach($resultado as $usuario){
            $usuarios[] = new Usuario($usuario['id'], $usuario['nome'], $usuario['email']);
        }

        return $usuarios;
    }

    public function selectById($dados)
    {
        $consulta = $this->db->prepare("SELECT * from usuarios WHERE id=:id");
        $consulta->bindparam(":id", $dados->id);
        $consulta->execute();
        $usuario = $consulta->fetch();
        return new Usuario($usuario['id'], $usuario['nome'], $usuario['email']);
    }

    public function login($dados)
    {
        $consulta = $this->db->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha");
        $consulta->bindparam(":email", $dados->email);
        $consulta->bindparam(":senha", $dados->senha);
        $consulta->execute();
        $usuario = $consulta->fetch();
        echo ("Usuario: "+$usuario);
    }


}