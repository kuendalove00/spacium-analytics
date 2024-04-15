<?php

namespace app\Model;

class Inscricao {

    private int $id;
    private string $nome;
    private string $data_constituicao;
    private string $data_inscricao;
    private string $localizacao;
    private string $contacto;
    private string $email;
    private string $nif;
    private string $website;
    private string $descricao;
    private string $integrantes;
    private string $sector;
    private string $modelo;
    private string $estado;
    private string $idv;
    private string $participacoes;
    private float $montante;
    private string $grau_inovacao;
    private string $escalabilidade;
    private string $impacto;
    private string $fundos_obtidos;
    private string $tecnologia;
    private string $maturidade;


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
        return $this->localizacao;
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

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getIntegrantes(): string {
        return $this->integrantes;
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

    public function setMorada(string $localizacao): void {
        $this->localizacao = $localizacao;
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

    public function setDescricao(string $descricao): void {
        $this->$descricao = $descricao;
    }

    public function setIntegrantes(string $integrantes): void {
        $this->integrantes = $integrantes;
    }

    public function setSector(string $sector): void {
        $this->$sector = $sector;
    }

    public function setModelo(string $modelo): void {
        $this->modelo = $modelo;
    }

    public function __construct(int $id, string $nome, string $data_constituicao, string $data_inscricao, string $localizacao, string $contacto, string $email, string $nif,  string $website, string $descricao, string $integrantes, string $sector, string $modelo, string $estado, string $idv, string $participacoes, string $montante, string $grau_inovacao, string $escalabilidade, string $impacto, string $fundos_obtidos, string $tecnologia, string $maturidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_constituicao = $data_constituicao;
        $this->data_inscricao = $data_inscricao;
        $this->localizacao = $localizacao;
        $this->contacto = $contacto;
        $this->email = $email;
        $this->nif = $nif;
        $this->website = $website;
        $this->descricao = $descricao;
        $this->integrantes = $integrantes;
        $this->sector = $sector;
        $this->estado = $estado;
        $this->idv = $idv;
        $this->participacoes = $participacoes;
        $this->montante = $montante;
        $this->grau_inovacao = $grau_inovacao;
        $this->escalabilidade = $escalabilidade;
        $this->impacto = $impacto;
        $this->fundos_obtidos = $fundos_obtidos;
        $this->tecnologia = $tecnologia;
        $this->maturidade = $maturidade;
    }
}