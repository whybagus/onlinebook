<?php

namespace App\Libraries;

class Text
{
    public static function translate($str)
    {
        $result = str_replace('_', ' ', $str);
        return ucfirst($result);
    }
}
