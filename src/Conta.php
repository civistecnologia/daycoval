<?php

namespace Civis\Daycoval;

class Conta
{

    private $banco = 707;
    private $agencia;
    private $agencia_dv;
    private $cc;
    private $cc_dv;
    private $carteira;
    private $operacao;

    public function __construct(
        $agencia,
        $agencia_dv,
        $cc,
        $cc_dv,
        $carteira,
        $operacao,
    ) {
        $this->agencia = $agencia;
        $this->agencia_dv = $agencia_dv;
        $this->cc = $cc;
        $this->cc_dv = $cc_dv;
        $this->carteira = $carteira;
        $this->operacao = $operacao;
    }

    public function getBanco()
    {
        return $this->banco;
    }
    public function getAgencia()
    {
        return $this->agencia;
    }
    public function getAgenciaDv()
    {
        return $this->agencia_dv;
    }
    public function getCC()
    {
        return $this->cc;
    }
    public function getCCDv()
    {
        return $this->cc_dv;
    }
    public function getCarteira()
    {
        return $this->carteira;
    }
    public function getOperacao()
    {
        return $this->operacao;
    }
}
