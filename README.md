# daycoval
Repositório responsável por gerar remessas e boletos do banco daycoval

# instalação

composer require civis/daycoval

# exemplo remessa

$objBeneficiario = new \Civis\Daycoval\Beneficiario(
    "RAZAO SOCIAL",
    "CNPJ"
);

$objConta = new \Civis\Daycoval\Conta(
    "agencia",
    "agencia-dv",
    "conta",
    "conta-dv",
    "carteira",
    "operacao"
);

$objRemessa = new \Civis\Daycoval\Remessa(
    "CODIGO CEDENTE",
    "RAZAO SOCIAL"
);

$objPagador = new \Civis\Daycoval\Pagador(
    "NOME OU RAZAO SOCIAL",
    "CPF OU CNPJ",
    "ENDERECO",
    "CEP",
    "BAIRRO",
    "CIDADE",
    "UF"
);

$objBoleto = new \Civis\Daycoval\Boleto(
    "COD DOCUMENTO",
    "NOSSO NUMERO",
    "SEU NUMERO",
    "VENCIMENTO",
    "EMISSAO",
    "VALOR",
    $objPagador,
    $objBeneficiario,
    $objConta
);

$objRemessa->addBoleto($objBoleto, "NUMERO NOTA FISCAL", "VALOR NOTA FISCAL", "DATA EMISSAO", "CHAVE NFE");

$content = $objRemessa->getRemessa();

# exemplo boleto

$objBeneficiario = new \Civis\Daycoval\Beneficiario(
    "RAZAO SOCIAL",
    "CNPJ"
);

$objConta = new \Civis\Daycoval\Conta(
    "agencia",
    "agencia-dv",
    "conta",
    "conta-dv",
    "carteira",
    "operacao"
);

$objPdf = new \Civis\Daycoval\Pdf();

$objPagador = new \Civis\Daycoval\Pagador(
    "NOME OU RAZAO SOCIAL",
    "CPF OU CNPJ",
    "ENDERECO",
    "CEP",
    "BAIRRO",
    "CIDADE",
    "UF"
);

$objBoleto = new \Civis\Daycoval\Boleto(
    "COD DOCUMENTO",
    "NOSSO NUMERO",
    "SEU NUMERO",
    "VENCIMENTO",
    "EMISSAO",
    "VALOR",
    $objPagador,
    $objBeneficiario,
    $objConta
);

$objPdf->addBoleto($objBoleto, "NUMERO NOTA FISCAL", "VALOR NOTA FISCAL", "DATA EMISSAO", "CHAVE NFE");

$objPdf->render();
