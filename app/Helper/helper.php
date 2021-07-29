<?php

namespace App\Helper;

class Helper
{
    public static function strToDayAsNum($str) {
        return intval(date('w', strtotime($str)));
    }
}
