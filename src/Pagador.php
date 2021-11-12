<?php

namespace Civis\Daycoval;

class Pagador
{

    public $nome;
    public $inscricao;
    public $logradouro;
    public $cep;
    public $bairro;
    public $cidade;
    public $uf;
    private $tipo;

    public function __construct(
        string $nome,
        string $inscricao,
        string $logradouro,
        string $cep,
        string $bairro,
        string $cidade,
        string $uf
    ) {
        $this->nome         = $nome;
        $this->inscricao    = $inscricao;
        $this->logradouro   = $logradouro;
        $this->cep          = $cep;
        $this->bairro       = $bairro;
        $this->cidade       = $cidade;
        $this->uf           = $uf;
        $this->tipo = strlen(preg_replace("/[^0-9]/", "", $inscricao)) == 14 ? "cnpj" : "cpf";
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function getLogradouro(): string
    {
        return $this->logradouro;
    }
    public function getCep(): string
    {
        return $this->cep;
    }
    public function getCepFormatado(): string
    {
        return preg_replace("/[^0-9]/", "", $this->cep);
    }
    public function getBairro(): string
    {
        return $this->bairro;
    }
    public function getCidade(): string
    {
        return $this->cidade;
    }
    public function getUf(): string
    {
        return $this->uf;
    }
    public function getTipo(): string
    {
        return $this->tipo;
    }
    public function getInscricaoFormatada(): string
    {
        return preg_replace("/[^0-9]/", "", $this->inscricao);
    }
    public function getInscricao(): string
    {
        return $this->inscricao;
    }
}
