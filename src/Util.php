<?php

namespace Civis\Daycoval;

class Util
{
    static $CODIGO_BANCO = 707;

    public static function numeric($string, $position = array()): string
    {
        $lengh = self::lengh($position);
        return sprintf("%0{$lengh}d", $string);
    }

    public static function alphanumeric($string, $position = array(), $pad = " ", $pad_type = STR_PAD_RIGHT): string
    {
        $lengh = self::lengh($position);
        return str_pad(substr($string, 0, $lengh), $lengh, $pad, $pad_type);
    }

    public static function money($value, $position = array()): string
    {
        $lengh = self::lengh($position);
        return str_pad(number_format($value, 2, "", ""), $lengh, "0", STR_PAD_LEFT);
    }

    public static function date($date, $position = array())
    {
        if ($date) {
            $lengh = self::lengh($position);
            return $lengh == 6 ? date("dmy", strtotime($date)) : date("dmY", strtotime($date));
        } else {
            return self::numeric(0, $position);
        }
    }

    public static function dateptbr($date): string
    {
        list($y, $m, $d) = explode("-", $date);
        return "{$d}/{$m}/{$y}";
    }

    private static function lengh(array $position): int
    {
        return ($position[1] - $position[0]) + 1;
    }
}
