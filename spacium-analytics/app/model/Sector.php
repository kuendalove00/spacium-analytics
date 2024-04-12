<?php

namespace app\Model;

class Sector {

    private int $id;
    private string $nome;
    private string $descricao;

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function __construct(int $id, string $nome, $descricao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->nome = $descricao;
    }
}