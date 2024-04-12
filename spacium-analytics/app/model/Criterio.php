<?php

namespace app\Model;

class Criterio {

    private int $id;
    private string $mvp;
    private string $idv;
    private string $impacto_social;
    private string $inovacao;

    public function getId(): int {
        return $this->id;
    }

    public function getMVP(): string {
        return $this->mvp;
    }

    public function getIdv(): string {
        return $this->idv;
    }

    public function getImpactoSocial(): string {
        return $this->impacto_social;
    }

    public function getInovacao(): string {
        return $this->inovacao;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setMVP(string $mvp): void {
        $this->mvp = $mvp;
    }

    public function setIdv(string $idv): void {
        $this->idv = $idv;
    }

    public function setImpactoSocial(string $impacto_social): void {
        $this->impacto_social = $impacto_social;
    }

    public function setInovacao(string $inovacao): void {
        $this->inovacao = $inovacao;
    }

    public function __construct(int $id, string $mvp, string $idv, string $impacto_social, string $inovacao) {
        $this->id = $id;
        $this->mvp = $mvp;
        $this->idv = $idv;
        $this->impacto_social = $impacto_social;
        $this->inovacao = $inovacao;
    }
}