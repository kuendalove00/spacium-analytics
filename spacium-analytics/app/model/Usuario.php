<?php

namespace app\Model;

class Usuario {

    private int $id;
    private string $nome;
    private string $senha;

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function __construct(int $id, string $nome, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->nome = $senha;
    }
}