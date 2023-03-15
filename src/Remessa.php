<?php

namespace Civis\Daycoval;

use Civis\Daycoval\Util;

class Remessa
{

    const PULO_LINHA = "\r" . PHP_EOL;

    const CODIGO_REMESSA = 1;
    const CODIGO_PEDIDO_BAIXA = 2;
    const CODIGO_ABATIMENTO = 4;
    const CODIGO_ALTERACAO_VENCIMENTO = 6;
    const CODIGO_PROTESTAR = 9;
    const CODIGO_PEDIDO_NAO_PROTESTAR = 10;
    const CODIGO_SUSTAR_PROTESTO = 18;

    private $header = "";
    private $content = "";
    private $trailler = "";

    private $codEmpresa;
    private $nomeEmpresa;
    private $sequencial = 1;

    public function __construct($codEmpresa, $nomeEmpresa)
    {
        $this->codEmpresa = $codEmpresa;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->header();
    }

    private function header(): void
    {
        $this->header .= Util::numeric(0, [1, 1]);
        $this->header .= Util::numeric(1, [2, 2]);
        $this->header .= Util::alphanumeric("REMESSA", [3, 9]);
        $this->header .= Util::numeric(1, [10, 11]);
        $this->header .= Util::alphanumeric("COBRANCA", [12, 26]);
        $this->header .= Util::alphanumeric($this->codEmpresa, [27, 46]);
        $this->header .= Util::alphanumeric($this->nomeEmpresa, [47, 76]);
        $this->header .= Util::numeric(707, [77, 79]);
        $this->header .= Util::alphanumeric("BANCO DAYCOVAL", [80, 94]);
        $this->header .= Util::date(date("Y-m-d"), [95, 100]);
        $this->header .= Util::alphanumeric(" ", [101, 394]);
        $this->header .= Util::numeric($this->sequencial++, [395, 400]);
        $this->header .= self::PULO_LINHA;
    }

    public function addBoleto(\Civis\Daycoval\Boleto $boleto, $nfeNumero, $nfeValor, $nfeDataEmissao, $nfeChave, $codOcorrencia = self::CODIGO_REMESSA): void
    {

        if ($boleto->getAvalista()) {
            $codInscricao = $boleto->getAvalista()->getTipo() == 'cnpj' ? 4 : 3;
            $numInscricao = $boleto->getAvalista()->getInscricaoFormatada();
        } else {
            $codInscricao = $boleto->getBeneficiario()->getTipo() == 'cnpj' ? 2 : 1;
            $numInscricao = $boleto->getBeneficiario()->getInscricaoFormatada();
        }

        $this->content .= Util::numeric(1, [1, 1]);
        $this->content .= Util::numeric($codInscricao, [2, 3]);
        $this->content .= Util::numeric($numInscricao, [4, 17]);
        $this->content .= Util::alphanumeric($this->codEmpresa, [18, 37]);
        $this->content .= Util::alphanumeric($boleto->getCodDocumento(), [38, 62]);
        $this->content .= Util::numeric($boleto->getNossoNumero(), [63, 70]);
        $this->content .= Util::alphanumeric(" ", [71, 83]);
        $this->content .= Util::alphanumeric(" ", [84, 107]);
        $this->content .= Util::numeric(6, [108, 108]);
        $this->content .= Util::numeric($codOcorrencia, [109, 110]);
        $this->content .= Util::numeric($boleto->getSeuNumero(), [111, 120]);
        $this->content .= Util::date($boleto->getDataVencimento(), [121, 126]);
        $this->content .= Util::money($boleto->getValor(), [127, 139]);
        $this->content .= Util::numeric(707, [140, 142]);
        $this->content .= Util::numeric(0, [143, 146]);
        $this->content .= Util::numeric(0, [147, 147]);
        $this->content .= Util::alphanumeric($boleto->getEspecie(), [148, 149]);
        $this->content .= Util::alphanumeric($boleto->getAceite(), [150, 150]);
        $this->content .= Util::date($boleto->getDataEmissao(), [151, 156]);
        $this->content .= Util::numeric(0, [157, 158]);
        $this->content .= Util::numeric(0, [159, 160]);
        $this->content .= Util::numeric(0, [161, 173]);
        $this->content .= Util::date($boleto->getDataDesconto(), [174, 179]);
        $this->content .= Util::money($boleto->getValorDesconto(), [180, 192]);
        $this->content .= Util::numeric(0, [193, 205]);
        $this->content .= Util::numeric(0, [206, 218]); // valor abatimento
        $this->content .= Util::numeric($boleto->getPagador()->getTipo() == 'cpf' ? 1 : 2, [219, 220]);
        $this->content .= Util::numeric($boleto->getPagador()->getInscricaoFormatada(), [221, 234]);
        $this->content .= Util::alphanumeric($boleto->getPagador()->getNome(), [235, 264]);
        $this->content .= Util::alphanumeric(" ", [265, 274]);
        $this->content .= Util::alphanumeric($boleto->getPagador()->getLogradouro(), [275, 314]);
        $this->content .= Util::alphanumeric($boleto->getPagador()->getBairro(), [315, 326]);
        $this->content .= Util::numeric($boleto->getPagador()->getCepFormatado(), [327, 334]);
        $this->content .= Util::alphanumeric($boleto->getPagador()->getCidade(), [335, 349]);
        $this->content .= Util::alphanumeric($boleto->getPagador()->getUf(), [350, 351]);
        $this->content .= Util::alphanumeric($boleto->getAvalista() ? $boleto->getAvalista()->getNome() : $boleto->getBeneficiario()->getNome(), [352, 381]);
        $this->content .= Util::alphanumeric(" ", [382, 385]);
        $this->content .= Util::alphanumeric(" ", [386, 391]);
        $this->content .= Util::numeric(0, [392, 393]);
        $this->content .= Util::numeric(0, [394, 394]);
        $this->content .= Util::numeric($this->sequencial++, [395, 400]);
        $this->content .= self::PULO_LINHA;

        $this->content .= Util::numeric(4, [1, 1]);
        $this->content .= Util::alphanumeric($nfeNumero, [2, 16]);
        $this->content .= Util::money($nfeValor, [17, 29]);
        $this->content .= Util::date($nfeDataEmissao, [30, 37]);
        $this->content .= Util::alphanumeric($nfeChave, [38, 81]);
        $this->content .= Util::alphanumeric(" ", [82, 394]);
        $this->content .= Util::numeric($this->sequencial++, [395, 400]);
        $this->content .= self::PULO_LINHA;
    }

    private function trailler(): void
    {
        $this->trailler .= Util::numeric(9, [1, 1]);
        $this->trailler .= Util::alphanumeric(" ", [2, 394]);
        $this->trailler .= Util::numeric($this->sequencial, [395, 400]);
    }

    public function getRemessa(): string
    {
        $this->trailler();
        return $this->header . $this->content . $this->trailler;
    }

    public function downloadRemessa(int $num): void
    {
        $content = $this->getRemessa();
        $filename = dirname(__DIR__, 1) . "/tmp/4X0" . date("dm") . $num . ".TXT";
        $file = fopen($filename, "w+");
        fwrite($file, $content);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($filename) . "\"");
        readfile($filename);
        unlink($filename);
    }
}
