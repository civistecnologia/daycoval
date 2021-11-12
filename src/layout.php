<style>
    body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 14px;
    }

    table,
    tr,
    td {
        border: 0;
        margin: 0;
        padding: 0;
        border-collapse: collapse;
        border-spacing: 0;
    }

    span {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .table-content-style tr {
        border-top: 1px solid #9C9C9C;
        border-bottom: 1px solid #9C9C9C;
    }

    .table-content-style td {
        vertical-align: top;
        padding: 2px 5px 1px 1px;
    }

    .table-child-content-style {
        width: 100%;
    }

    .table-child-content-style tr {
        border-top: none;
        border-bottom: none;
    }

    .table-child-content-style td {
        padding: 2px 5px 1px 1px;
        border-right: 1px solid #9C9C9C;
    }

    .content-label {
        font-size: 9px;
    }

    .content-text {
        font-size: 10px;
        font-weight: bold;
    }

    .cell-bg-01 {
        background-color: #E8E6E6;
    }

    .empty-cell {
        height: 7px;
    }
</style>
<?php foreach ($this->boletos as $index => $boleto) { ?>

    <?php if ($index > 0) echo "<pagebreak></pagebreak>"; ?>

    <table style="border-bottom: 1px solid #9C9C9C; width: 100%;">
        <tr>
            <td style="width: 230px;">
                <table>
                    <tr>
                        <td style="padding-right: 30px"><img src="./img/logo-daycoval.jpg" alt="" style="width: 190px;margin-bottom:5px;"></td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: bottom;width: 70px;">
                <table style="border-left: 3px solid #021455;border-right: 3px solid #021455;vertical-align: bottom;">
                    <tr>
                        <td style="padding: 5px 5px 0 5px;">
                            <span style="font-size: 16px;font-weight:bold;">707-2</span>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: bottom;text-align:right;"><span style="font-size: 15px;font-weight:bold;">Recibo do pagador</span></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width:75%; border-right: 1px solid #9C9C9C; vertical-align:top;">
                <table class="table-content-style " style="width: 100%;">
                    <tr>
                        <td>
                            <span class="content-label">
                                Local de Pagamento
                            </span><br />
                            <span class="content-text">
                                PAGAVEL EM QUALQUER AGÊNCIA BANCÁRIA, MESMO APÓS VENCIMENTO
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="content-label">
                                Beneficiário
                            </span><br />
                            <span class="content-text">
                                <?php echo $boleto->getBeneficiario()->getNome(); ?> - CNPJ <?php echo $boleto->getBeneficiario()->getInscricaoFormatada(); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; height:0;">
                            <table class="table-child-content-style">
                                <tr>
                                    <td style="padding-left:1px;">
                                        <span class="content-label">
                                            Data Documento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataEmissao()); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            N° Documento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getCodDocumento(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Espécie Documento
                                        </span><br />
                                        <span class="content-text">
                                            DM
                                        </span>
                                    </td>
                                    <td style="width: 80px;">
                                        <span class="content-label">
                                            Aceite
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getAceite(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Data Processamento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataEmissao()); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; height:0">
                            <table class="table-child-content-style">
                                <tr>
                                    <td style="padding-left:1px;">
                                        <span class="content-label">
                                            Uso do banco
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getOperacao(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Carteira
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getCarteira(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Espécie
                                        </span><br />
                                        <span class="content-text">
                                            REAL
                                        </span>
                                    </td>
                                    <td style="border-right:none;">
                                        <span class="content-label">
                                            Quantidade
                                        </span><br />
                                        <span class="content-text">

                                        </span>
                                    </td>
                                    <td style="border: none;padding:0;width:7px;"><img src="./img/x-line-3.jpg" alt="" style="width: 4px;"></td>
                                    <td style="width:100px;" >
                                        <span class="content-label">
                                            Valor
                                        </span><br />
                                        <span class="content-text">

                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border: none;">
                        <td>
                            <span class="content-label">
                                Informações de responsabilidade do beneficiário
                            </span><br />
                            <span class="content-text">
                                MULTA DE 2,00 % A PARTIR DE <?php echo date("d/m/Y", strtotime($boleto->getDataVencimento() . " + 1 day")); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="second-col" style="width: 25%;vertical-align:top;border-right:1px solid #900">
                <table class="table-content-style" style="width: 100%;">
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Vencimento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataVencimento()); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Agência/Código Benefeciário
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo "{$boleto->getConta()->getAgencia()}-{$boleto->getConta()->getAgenciaDv()} / {$boleto->getConta()->getCC()}-{$boleto->getConta()->getCCDv()}"; ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Nosso Número
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getAgencia() . "/" . $boleto->getConta()->getCarteira() . "/" . \Civis\Daycoval\Util::numeric($boleto->getNossoNumero(), [1, 10]) . "-" . $boleto->getNossoNumeroDv(); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( = ) Valor Documento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo number_format($boleto->getValor(), 2, ",", "."); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( - ) Desconto/Abatimento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( - ) Outras Deduções
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( + ) Mora/Multa
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( + ) Outros Acréscimos
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( = ) Valor Cobrado
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width:100%; border-right: 1px solid #9C9C9C; vertical-align:top;">
                <table class="table-content-style " style="width: 100%;">
                    <tr style="border-bottom: none;">
                        <td style="width: 100px;">
                            <span class="content-label">
                                Pagador
                            </span>
                        </td>
                        <td style="width: 450px;font-weight:bold;font-size:10px;">
                            <?php echo $boleto->getPagador()->getNome(); ?><br />
                            <?php echo $boleto->getPagador()->getLogradouro(); ?> - <?php echo $boleto->getPagador()->getBairro(); ?> - <?php echo $boleto->getPagador()->getCidade(); ?> - <?php echo $boleto->getPagador()->getUf(); ?>
                        </td>
                        <td>
                            <span class="content-label" style="font-weight: bold;font-size:10px;">
                                CNPJ/CPF: <?php echo $boleto->getPagador()->getInscricao(); ?>
                            </span><br />
                        </td>
                    </tr>
                    <tr style="border: none; ">
                        <td style="">
                            <span class="content-label">
                                Beneficiário Final
                            </span>

                        </td>
                        <td style="font-weight:bold;vertical-align:top;font-size:10px;">
                            <?php echo $boleto->getBeneficiario()->getNome(); ?>
                        </td>
                        <td>
                            <span class="content-label" style="font-weight: bold;font-size:10px;">
                                CNPJ/CPF: <?php echo $boleto->getBeneficiario()->getInscricao(); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="table-content-style " style="width: 100%;">

        <tr style="border-bottom: none">
            <td style="width: 450px;">
            </td>
            <td style="vertical-align:top; width: 100px;">
                <span class="content-label">
                    Autenticação Mecânica
                </span><br />

            </td>
            <td style="vertical-align:top;text-align: right;width:310px;">
                <span class="content-label" style="font-size: 13px;font-weight: bold;">
                    Ficha de Compensação
                </span>

            </td>
            <td>

            </td>
        </tr>
    </table>

    <!-- spacer -->
    <table style="width: 100%;margin:40px 0 5px 0;">
        <tr style="border-top: 1px dashed #000;margin:5px 0;">
            <td>&nbsp;</td>
        </tr>
    </table>


    <!-- ============================== -->
    <!-- BLOCK TABLES -->
    <!-- ============================== -->


    <table style="border-bottom: 1px solid #9C9C9C; width: 100%;">
        <tr>
            <td style="width: 230px;">
                <table>
                    <tr>
                        <td style="padding-right: 30px"><img src="./img/logo-daycoval.jpg" alt="" style="width: 190px;margin-bottom:5px;"></td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: bottom;width: 70px;">
                <table style="border-left: 3px solid #021455;border-right: 3px solid #021455;vertical-align: bottom;">
                    <tr>
                        <td style="padding: 5px 5px 0 5px;">
                            <span style="font-size: 16px;font-weight:bold;">707-2</span>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: bottom;text-align:right;"><span style="font-size: 15px;font-weight:bold;">Ficha de caixa</span></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width:75%; border-right: 1px solid #9C9C9C; vertical-align:top;">
                <table class="table-content-style " style="width: 100%;">

                    <tr>
                        <td>
                            <span class="content-label">
                                Beneficiário
                            </span><br />
                            <span class="content-text">
                                <?php echo $boleto->getBeneficiario()->getNome(); ?> - CNPJ <?php echo $boleto->getBeneficiario()->getInscricaoFormatada(); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; height:0;">
                            <table class="table-child-content-style">
                                <tr>
                                    <td style="padding-left:1px;">
                                        <span class="content-label">
                                            Data Documento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataEmissao()); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            N° Documento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getCodDocumento(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Espécie Documento
                                        </span><br />
                                        <span class="content-text">
                                            DM
                                        </span>
                                    </td>
                                    <td style="width: 80px;">
                                        <span class="content-label">
                                            Aceite
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getAceite(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Data Processamento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataEmissao()); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; height:0">
                            <table class="table-child-content-style">
                                <tr>
                                    <td style="padding-left:1px;">
                                        <span class="content-label">
                                            Uso do banco
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getOperacao(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Carteira
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getCarteira(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Espécie
                                        </span><br />
                                        <span class="content-text">
                                            REAL
                                        </span>
                                    </td>
                                    <td style="border-right:none;">
                                        <span class="content-label">
                                            Quantidade
                                        </span><br />
                                        <span class="content-text">

                                        </span>
                                    </td>
                                    <td style="border: none;padding:0;width:7px;"><img src="./img/x-line-3.jpg" alt="" style="width: 4px;"></td>
                                    <td style="width:100px;" >
                                        <span class="content-label">
                                            Valor
                                        </span><br />
                                        <span class="content-text">

                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border: none;">
                        <td>
                            <span class="content-label">
                                Informações de responsabilidade do beneficiário
                            </span><br />
                            <span class="content-text">
                                MULTA DE 2,00 % A PARTIR DE <?php echo date("d/m/Y", strtotime($boleto->getDataVencimento() . " + 1 day")); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="second-col" style="width: 25%;vertical-align:top;border-right:1px solid #900">
                <table class="table-content-style" style="width: 100%;">
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Vencimento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataVencimento()); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Nosso Número
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getAgencia() . "/" . $boleto->getConta()->getCarteira() . "/" . \Civis\Daycoval\Util::numeric($boleto->getNossoNumero(), [1, 10]) . "-" . $boleto->getNossoNumeroDv(); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( = ) Valor Documento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo number_format($boleto->getValor(), 2, ",", "."); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( - ) Desconto/Abatimento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( - ) Outras Deduções
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( + ) Mora/Multa
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( + ) Outros Acréscimos
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( = ) Valor Cobrado
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width:100%; border-right: 1px solid #9C9C9C; vertical-align:top;">
                <table class="table-content-style " style="width: 100%;">
                    <tr style="border-bottom: none;">
                        <td style="width: 100px;">
                            <span class="content-label">
                                Pagador
                            </span>
                        </td>
                        <td style="width: 450px;font-weight:bold;font-size:10px;">
                            <?php echo $boleto->getPagador()->getNome(); ?>
                        </td>
                        <td>
                            <span class="content-label" style="font-weight: bold;font-size:10px;">
                                CNPJ/CPF: <?php echo $boleto->getPagador()->getInscricao(); ?>
                            </span><br />
                        </td>
                    </tr>
                    <tr style="border: none; ">
                        <td style="">
                            <span class="content-label">
                                Beneficiário Final
                            </span>

                        </td>
                        <td style="font-weight:bold;vertical-align:top;font-size:10px;">
                            <?php echo $boleto->getBeneficiario()->getNome(); ?>
                        </td>
                        <td>
                            <span class="content-label" style="font-weight: bold;font-size:10px;">
                                CNPJ/CPF: <?php echo $boleto->getBeneficiario()->getInscricao(); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="table-content-style " style="width: 100%;">

        <tr style="border-bottom: none">
            <td style="width: 450px;">
            </td>
            <td style="vertical-align:top; width: 100px;">
                <span class="content-label">
                    Autenticação Mecânica
                </span><br />

            </td>
            <td style="vertical-align:top;text-align: right;width:310px;">
                <span class="content-label" style="font-size: 13px;font-weight: bold;">
                    Ficha de Compensação
                </span>

            </td>
            <td>

            </td>
        </tr>
    </table>

    <table style="width: 100%;margin:30px 0 15px 0;">
        <tr style="border-top: 1px dashed #000;margin:5px 0;">
            <td>&nbsp;</td>
        </tr>
    </table>


    <!-- ============================== -->
    <!-- BLOCK TABLES -->
    <!-- ============================== -->


    <table style="border-bottom: 1px solid #9C9C9C; width: 100%;">
        <tr>
            <td style="width: 230px;">
                <table>
                    <tr>
                        <td style="padding-right: 30px"><img src="./img/logo-daycoval.jpg" alt="" style="width: 190px;margin-bottom:5px;"></td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: bottom;width: 70px;">
                <table style="border-left: 3px solid #021455;border-right: 3px solid #021455;vertical-align: bottom;">
                    <tr>
                        <td style="padding: 5px 5px 0 5px;">
                            <span style="font-size: 16px;font-weight:bold;">707-2</span>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: bottom;text-align:right;"><span style="font-size: 15px;"><?php echo $boleto->getLinhaDigitavel(); ?></span></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width:75%; border-right: 1px solid #9C9C9C; vertical-align:top;">
                <table class="table-content-style " style="width: 100%;">
                    <tr>
                        <td>
                            <span class="content-label">
                                Local de Pagamento
                            </span><br />
                            <span class="content-text">
                                PAGAVEL EM QUALQUER AGÊNCIA BANCÁRIA, MESMO APÓS VENCIMENTO
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="content-label">
                                Beneficiário
                            </span><br />
                            <span class="content-text">
                                <?php echo $boleto->getBeneficiario()->getNome(); ?> - CNPJ <?php echo $boleto->getBeneficiario()->getInscricaoFormatada(); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; height:0;">
                            <table class="table-child-content-style">
                                <tr>
                                    <td style="padding-left:1px;">
                                        <span class="content-label">
                                            Data Documento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataEmissao()); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            N° Documento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getCodDocumento(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Espécie Documento
                                        </span><br />
                                        <span class="content-text">
                                            DM
                                        </span>
                                    </td>
                                    <td style="width: 80px;">
                                        <span class="content-label">
                                            Aceite
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getAceite(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Data Processamento
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataEmissao()); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; height:0">
                            <table class="table-child-content-style">
                                <tr>
                                    <td style="padding-left:1px;">
                                        <span class="content-label">
                                            Uso do banco
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getOperacao(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Carteira
                                        </span><br />
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getCarteira(); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-label">
                                            Espécie
                                        </span><br />
                                        <span class="content-text">
                                            REAL
                                        </span>
                                    </td>
                                    <td style="border-right:none;">
                                        <span class="content-label">
                                            Quantidade
                                        </span><br />
                                        <span class="content-text">

                                        </span>
                                    </td>
                                    <td style="border: none;padding:0;width:7px;"><img src="./img/x-line-3.jpg" alt="" style="width: 4px;"></td>
                                    <td style="width:100px;" >
                                        <span class="content-label">
                                            Valor
                                        </span><br />
                                        <span class="content-text">

                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border: none;">
                        <td>
                            <span class="content-label">
                                Informações de responsabilidade do beneficiário
                            </span><br />
                            <span class="content-text">
                                MULTA DE 2,00 % A PARTIR DE <?php echo date("d/m/Y", strtotime($boleto->getDataVencimento() . " + 1 day")); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="second-col" style="width: 25%;vertical-align:top;border-right:1px solid #900">
                <table class="table-content-style" style="width: 100%;">
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Vencimento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo \Civis\Daycoval\Util::dateptbr($boleto->getDataVencimento()); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Agência/Código Benefeciário
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo "{$boleto->getConta()->getAgencia()}-{$boleto->getConta()->getAgenciaDv()} / {$boleto->getConta()->getCC()}-{$boleto->getConta()->getCCDv()}"; ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            Nosso Número
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo $boleto->getConta()->getAgencia() . "/" . $boleto->getConta()->getCarteira() . "/" . \Civis\Daycoval\Util::numeric($boleto->getNossoNumero(), [1, 10]) . "-" . $boleto->getNossoNumeroDv(); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( = ) Valor Documento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="text-align: right; padding-top: 1px">
                                        <span class="content-text">
                                            <?php echo number_format($boleto->getValor(), 2, ",", "."); ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( - ) Desconto/Abatimento
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( - ) Outras Deduções
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( + ) Mora/Multa
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( + ) Outros Acréscimos
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-bottom: none">
                        <td class="cell-bg-01" style="padding: 0; width: 100%;">
                            <table style="width: 100%;">
                                <tr style="border: none;">
                                    <td style="padding: 1px 2px 0 1px;">
                                        <span class="content-label">
                                            ( = ) Valor Cobrado
                                        </span>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td class="empty-cell" style="text-align: right; padding-top: 1px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width:100%; border-right: 1px solid #9C9C9C; vertical-align:top;">
                <table class="table-content-style " style="width: 100%;">
                    <tr style="border-bottom: none;">
                        <td style="width: 100px;">
                            <span class="content-label">
                                Pagador
                            </span>
                        </td>
                        <td style="width: 450px;font-weight:bold;font-size:10px;">
                            <?php echo $boleto->getPagador()->getNome(); ?>
                        </td>
                        <td>
                            <span class="content-label" style="font-weight: bold;font-size:10px;">
                                CNPJ/CPF: <?php echo $boleto->getPagador()->getInscricao(); ?>
                            </span><br />
                        </td>
                    </tr>
                    <tr style="border: none; ">
                        <td style="">
                            <span class="content-label">
                                Beneficiário Final
                            </span>

                        </td>
                        <td style="font-weight:bold;vertical-align:top;font-size:10px;">
                            <?php echo $boleto->getBeneficiario()->getNome(); ?>
                        </td>
                        <td>
                            <span class="content-label" style="font-weight: bold;font-size:10px;">
                                CNPJ/CPF: <?php echo $boleto->getBeneficiario()->getInscricao(); ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="table-content-style " style="width: 100%;">

        <tr style="border-bottom: none">
            <td style="width: 450px;">
                <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($boleto->getCodigoBarras(), $generator::TYPE_CODE_128, 2, 100)) . '">';
                ?>
            </td>
            <td style="vertical-align:top; width: 100px;">
                <span class="content-label">
                    Autenticação Mecânica
                </span><br />

            </td>
            <td style="vertical-align:top;text-align: right;width:310px;">
                <span class="content-label" style="font-size: 13px;font-weight: bold;">
                    Ficha de Compensação
                </span>

            </td>
            <td>

            </td>
        </tr>
    </table>

<?php } ?>