<?php

namespace Civis\Daycoval;

class Boleto
{

    const ESPECIE_DUPLICATA = "01";
    const ESPECIE_RECIBO = "05";
    const ESPECIE_DUPLICATA_SERVIDO = "12";
    const ESPECIE_OUTROS = "99";

    private $moeda = 9;
    private $aceite = "N";

    private $codDocumento;
    private $nossoNumero;
    private $seuNumero;
    private $nossoNumeroDv;
    private $dataVencimento;
    private $dataEmissao;
    private $valor;
    private $especie;
    private $valorDesconto;
    private $dataDesconto;
    private $pagador;
    private $beneficiario;
    private $avalista;
    private $conta;
    private $codigoBarras;
    private $linhaDigitavel;
    private $instrucoes = array();


    public function __construct(
        $codDocumento,
        $nossoNumero,
        $seuNumero,
        $dataVencimento,
        $dataEmissao,
        $valor,
        \Civis\Daycoval\Pagador $pagador,
        \Civis\Daycoval\Beneficiario $beneficiario,
        \Civis\Daycoval\Conta $conta,
        $valorDesconto = 0,
        $dataDesconto = null,
        $especie = self::ESPECIE_DUPLICATA,
        \Civis\Daycoval\Beneficiario $avalista = null
    ) {
        $this->codDocumento = $codDocumento;
        $this->nossoNumero = $nossoNumero;
        $this->seuNumero = $seuNumero;
        $this->dataVencimento = $dataVencimento;
        $this->dataEmissao = $dataEmissao;
        $this->valor = $valor;
        $this->valorDesconto = $valorDesconto;
        $this->dataDesconto = $dataDesconto;
        $this->especie = $especie;
        $this->pagador = $pagador;
        $this->beneficiario = $beneficiario;
        $this->avalista = $avalista;
        $this->conta = $conta;
        $this->nossoNumeroDv = $this->calculaNossoNumeroDv();
        $this->codigoBarras = $this->calculaCodigoBarras();
        $this->linhaDigitavel = $this->calculaLinhaDigitavel();
    }

    public function getInstrucoes(): array
    {
        return $this->instrucoes;
    }

    public function addInstrucao(string $instrucao): void
    {
        $this->instrucoes[] = $instrucao;
    }

    public function getCodDocumento(): string
    {
        return $this->codDocumento;
    }

    public function getNossoNumero(): string
    {
        return $this->nossoNumero;
    }

    public function getSeuNumero(): string
    {
        return $this->seuNumero;
    }

    public function getNossoNumeroDv(): int
    {
        return $this->nossoNumeroDv;
    }

    public function getDataVencimento(): string
    {
        return $this->dataVencimento;
    }

    public function getDataEmissao(): string
    {
        return $this->dataEmissao;
    }

    public function getDataDesconto(): ?string
    {
        return $this->dataDesconto;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getValorDesconto(): float
    {
        return $this->valorDesconto;
    }

    public function getEspecie(): string
    {
        return $this->especie;
    }

    public function getAceite(): string
    {
        return $this->aceite;
    }

    public function getPagador(): \Civis\Daycoval\Pagador
    {
        return $this->pagador;
    }

    public function getBeneficiario(): \Civis\Daycoval\Beneficiario
    {
        return $this->beneficiario;
    }

    public function getAvalista(): ?\Civis\Daycoval\Beneficiario
    {
        return $this->avalista;
    }

    public function getConta(): \Civis\Daycoval\Conta
    {
        return $this->conta;
    }

    public function getMoeda(): int
    {
        return $this->moeda;
    }

    public function getCodigoBarras(): string
    {
        return $this->codigoBarras;
    }

    public function getLinhaDigitavel(): string
    {
        return substr($this->linhaDigitavel, 0, 5) . "." .
            substr($this->linhaDigitavel, 5, 5) . " " .
            substr($this->linhaDigitavel, 10, 5) . "." .
            substr($this->linhaDigitavel, 15, 6) . " " .
            substr($this->linhaDigitavel, 21, 5) . "." .
            substr($this->linhaDigitavel, 26, 6) . " " .
            substr($this->linhaDigitavel, 32, 1) . " " .
            substr($this->linhaDigitavel, 33);
    }

    private function calculaNossoNumeroDv(): int
    {
        $agencia = \Civis\Daycoval\Util::numeric($this->conta->getAgencia(), [1, 4]);
        $carteira = \Civis\Daycoval\Util::numeric($this->conta->getCarteira(), [1, 3]);
        $nossoNumero = \Civis\Daycoval\Util::numeric($this->getNossoNumero(), [1, 10]);
        return $this->modulo_10($agencia . $carteira . $nossoNumero);
    }

    private function calculaLinhaDigitavel(): string
    {
        $campo1 = $this->getConta()->getBanco();
        $campo1 .= $this->getMoeda();
        $campo1 .= \Civis\Daycoval\Util::numeric($this->getConta()->getAgencia(), [1, 4]);
        $campo1 .= substr(\Civis\Daycoval\Util::numeric($this->getConta()->getCarteira(), [1, 3]), 0, 1);
        $campo1 .= $this->modulo_10($campo1);

        $campo2 = substr(\Civis\Daycoval\Util::numeric($this->getConta()->getCarteira(), [1, 3]), 1);
        $campo2 .= \Civis\Daycoval\Util::numeric($this->getConta()->getOperacao(), [1, 4]);
        $campo2 .= substr(\Civis\Daycoval\Util::numeric($this->getNossoNumero(), [1, 10]), 0, 1);
        $campo2 .= $this->modulo_10($campo2);

        $campo3 = substr(\Civis\Daycoval\Util::numeric($this->getNossoNumero(), [1, 10]), 1);
        $campo3 .= $this->getNossoNumeroDv();
        $campo3 .= $this->modulo_10($campo3);

        $campo4 = $this->fator_vencimento($this->getDataVencimento());
        $campo4 .= \Civis\Daycoval\Util::money($this->getValor(), [1, 10]);

        return $campo1 . $campo2 . $campo3 . $this->getCodigoBarrasDv() . $campo4;
    }

    private function calculaCodigoBarras(): string
    {
        $codigoBarrasSemDv = $this->getCodigoBarrasSemDv();
        return substr($codigoBarrasSemDv, 0, 4) . $this->getCodigoBarrasDv() . substr($codigoBarrasSemDv, 4);
    }

    private function getCodigoBarrasSemDv(): string
    {
        return $this->conta->getBanco() .
            $this->getMoeda() .
            $this->fator_vencimento($this->getDataVencimento()) .
            \Civis\Daycoval\Util::money($this->getValor(), [1, 10]) .
            \Civis\Daycoval\Util::numeric($this->getConta()->getAgencia(), [1, 4]) .
            \Civis\Daycoval\Util::numeric($this->getConta()->getCarteira(), [1, 3]) .
            \Civis\Daycoval\Util::numeric($this->getConta()->getOperacao(), [1, 7]) .
            \Civis\Daycoval\Util::numeric($this->getNossoNumero(), [1, 10]) .
            $this->calculaNossoNumeroDv();
    }

    public function getCodigoBarrasDv(): int
    {
        return $this->modulo_11($this->getCodigoBarrasSemDv());
    }

    private function modulo_10($cod): int
    {
        $multi = ((strlen($cod) % 2) == 0) ? 1 : 2;
        $soma = 0;
        for ($i = 0; $i < strlen($cod); $i++) {
            $resultado = $multi * substr($cod, $i, 1);
            if ($resultado > 9) {
                $novoResultado = 0;
                for ($x = 0; $x < strlen($resultado); $x++) {
                    $novoResultado += substr($resultado, $x, 1);
                }
                $resultado = $novoResultado;
            }
            $soma += $resultado;
            $multi = ($multi == 2) ? 1 : 2;
        }
        return ($soma % 10 == 0) ? 0 : (10 - ($soma % 10));
    }

    private function modulo_11($num): int
    {
        $soma = 0;
        $fator = 2;
        for ($i = strlen($num); $i > 0; $i--) {
            $numeros[$i] = substr($num, $i - 1, 1);
            $parcial[$i] = $numeros[$i] * $fator;
            $soma += $parcial[$i];
            if ($fator == 9) {
                $fator = 1;
            }
            $fator++;
        }
        $dv = 11 - ($soma % 11);
        if ($dv == 0 || $dv == 1 || $dv > 9)
            return 1;
        return $dv;
    }

    private function fator_vencimento($data)
    {
        if ($data != "") {
            list($ano, $mes, $dia) = explode("-", $data);
            
            $fator = (abs(($this->_dateToDays("1997", "10", "07")) - ($this->_dateToDays($ano, $mes, $dia))));
            $limit = $fator % 9000;
            if ($limit >= 1000) {
                return $limit;
            }
            
            return $limit + 9000;
        } else {
            return "0000";
        }
    }

    private function _dateToDays($year, $month, $day)
    {
        $century = substr($year, 0, 2);
        $year = substr($year, 2, 2);
        if ($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            if ($year) {
                $year--;
            } else {
                $year = 99;
                $century--;
            }
        }
        return (floor((146097 * $century)    /  4) +
            floor((1461 * $year)        /  4) +
            floor((153 * $month +  2) /  5) +
            $day +  1721119);
    }
}
