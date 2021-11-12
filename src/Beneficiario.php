<?php

namespace Civis\Daycoval;

class Beneficiario
{

    private $nome;
    private $inscricao;
    private $tipo;

    public function __construct(
        string $nome,
        string $inscricao
    ) {
        $this->nome         = $nome;
        $this->inscricao    = $inscricao;
        $this->tipo = strlen(preg_replace("/[^0-9]/", "", $inscricao)) == 14 ? "cnpj" : "cpf";
    }

    public function getNome(): string
    {
        return $this->nome;
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
