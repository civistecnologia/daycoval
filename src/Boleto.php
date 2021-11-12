<?php

namespace Civis\Daycoval;

class Boleto
{

    public function __construct()
    {
    }

    public function render()
    {
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 3,
            'margin_bottom' => 2,
            'margin_header' => 5,
            'margin_footer' => 0
        ]);

        ob_start();
        include "daycoval.php";
        $html = ob_get_contents();
        ob_clean();

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
