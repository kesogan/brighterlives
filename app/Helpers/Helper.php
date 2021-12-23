<?php

namespace App\Helpers;

class Helper
{
    public function randomDigits($length)
    {
        $numbers = range(0, 10);

        shuffle($numbers);

        $digits = null;

        for ($i = 0; $i < $length; ++$i) {
            $digits .= $numbers[$i];
        }

        return $digits;
    }
}
