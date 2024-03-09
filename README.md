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
    "AGENCIA",
    "AGENCIA-DV",
    "CONTA",
    "CONTA-DV",
    "CARTEIRA",
    "OPERACAO"
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
    &emsp;&emsp;"COD DOCUMENTO",  
    &emsp;&emsp;"NOSSO NUMERO",  
    &emsp;&emsp;"SEU NUMERO",  
    &emsp;&emsp;"VENCIMENTO",  
    &emsp;&emsp;"EMISSAO",  
    &emsp;&emsp;"VALOR",  
    &emsp;&emsp;$objPagador,  
    &emsp;&emsp;$objBeneficiario,  
    &emsp;&emsp;$objConta  
);

$objRemessa->addBoleto($objBoleto, "NUMERO NOTA FISCAL", "VALOR NOTA FISCAL", "DATA EMISSAO", "CHAVE NFE");

$content = $objRemessa->getRemessa();

# exemplo boleto

$objBeneficiario = new \Civis\Daycoval\Beneficiario(
    "RAZAO SOCIAL",
    "CNPJ"
);

$objConta = new \Civis\Daycoval\Conta(
    "AGENCIA",
    "AGENCIA-DV",
    "CONTA",
    "CONTA-DV",
    "CARTEIRA",
    "OPERACAO"
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
    &emsp;&emsp;"COD DOCUMENTO",  
    &emsp;&emsp;"NOSSO NUMERO",  
    &emsp;&emsp;"SEU NUMERO",  
    &emsp;&emsp;"VENCIMENTO",  
    &emsp;&emsp;"EMISSAO",  
    &emsp;&emsp;"VALOR",  
    &emsp;&emsp;$objPagador,  
    &emsp;&emsp;$objBeneficiario,  
    &emsp;&emsp;$objConta  
);

$objPdf->addBoleto($objBoleto, "NUMERO NOTA FISCAL", "VALOR NOTA FISCAL", "DATA EMISSAO", "CHAVE NFE");

$objPdf->render();
