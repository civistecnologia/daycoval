<?php

namespace Civis\Daycoval;

class Pdf
{

    private $boletos = array();
    private $mpdf = null;

    public function __construct()
    {
        $this->mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 3,
            'margin_bottom' => 2,
            'margin_header' => 5,
            'margin_footer' => 0
        ]);
    }

    public function addBoleto(\Civis\Daycoval\Boleto $boleto): void
    {
        $this->boletos[] = $boleto;
    }

    public function render(): void
    {
        $html = $this->layout();
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
    }

    private function layout(): string
    {
        ob_start();
        include "layout.php";
        $html = ob_get_contents();
        ob_clean();
        return $html;
    }
}
