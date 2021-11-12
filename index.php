<?php
include 'vendor/autoload.php';

use Civis\Daycoval\Remessa;
use Civis\Daycoval\Boleto;
use Civis\Daycoval\Beneficiario;
use Civis\Daycoval\Conta;
use Civis\Daycoval\Pagador;
use Civis\Daycoval\Pdf;

// gerando remessa
$beneficiario = new Beneficiario(
    "MAX PAPERS FAB. PROD. DE PAPEL LTDA",
    "37.859.942/0001-30",
);

$conta = new Conta("0001", "9", "745803", "9", "121", "1613025");
$remessa = new Remessa(190600189006900, "MAX PAPERS FAB. PROD. DE PAPEL LTDA");
$pagador1 = new Pagador("TULIO CARVALHO RIBEIRO RODRIGUES", "060.859.994-88", "RUA HENRIQUE CAPITULINO 137", "51111-210", "BOA VIAGEM", "RECIFE", "PE");
$boleto1 = new Boleto(101, 84580106, "2021-11-13", "2021-11-13", 700.45, $pagador1, $beneficiario, $conta);

$boleto2 = new Boleto(102, 84580107, "2021-11-13", "2021-11-13", 500.37, $pagador1, $beneficiario, $conta);

$remessa->addBoleto($boleto1, 455, 700.45, "2021-11-13", "26211116803436000159550010000029941000029951");
//echo "<pre>";
//echo $remessa->getRemessa(1);

$pdf = new Pdf();
$pdf->addBoleto($boleto1);
$pdf->addBoleto($boleto2);
$pdf->render();
