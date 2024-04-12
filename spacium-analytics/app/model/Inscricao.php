<?php

namespace app\Model;

class Inscricao {

    private int $id;
    private string $nome;
    private string $data_constituicao;
    private string $data_inscricao;
    private string $morada;
    private string $contacto;
    private string $email;
    private string $nif;
    private string $website;
    private string $actividade;
    private string $resumo;
    private string $sector;
    private string $modelo;

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getDataConstituicao(): string {
        return $this->data_constituicao;
    }

    public function getDataInscricao(): string {
        return $this->data_inscricao;
    }

    public function getMorada(): string {
        return $this->morada;
    }
    public function getContacto(): string {
        return $this->contacto;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function getNif(): string {
        return $this->nif;
    }
    
    public function getWebsite(): string {
        return $this->website;
    }

    public function getActividade(): string {
        return $this->actividade;
    }

    public function getResumo(): string {
        return $this->resumo;
    }

    public function getSector(): string {
        return $this->sector;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setDataConstituicao(string $data_constituicao): void {
        $this->$data_constituicao = $data_constituicao;
    }

    public function setDataInscricao(string $data_inscricao): void {
        $this->$data_inscricao = $data_inscricao;
    }

    public function setMorada(string $morada): void {
        $this->morada = $morada;
    }

    public function setContacto(string $contacto): void {
        $this->contacto = $contacto;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setNif(string $nif): void {
        $this->nif = $nif;
    }

    public function setWebsite(string $website): void {
        $this->website = $website;
    }

    public function setActidade(string $actividade): void {
        $this->$actividade = $actividade;
    }

    public function setResumo(string $resumo): void {
        $this->resumo = $resumo;
    }

    public function setSector(string $sector): void {
        $this->$sector = $sector;
    }

    public function setModelo(string $modelo): void {
        $this->modelo = $modelo;
    }

    public function __construct(int $id, string $nome, string $data_constituicao, string $data_inscricao, string $morada, string $contacto, string $email, string $nif,  string $website, string $actividade, string $resumo, string $sector, string $modelo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_constituicao = $data_constituicao;
        $this->data_inscricao = $data_inscricao;
        $this->morada = $morada;
        $this->contacto = $contacto;
        $this->email = $email;
        $this->nif = $nif;
        $this->website = $website;
        $this->actividade = $actividade;
        $this->resumo = $resumo;
        $this->sector = $sector;
        $this->modelo = $modelo;
    }
}