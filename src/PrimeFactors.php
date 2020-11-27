<?php

namespace App;


class PrimeFactors
{
    public function generate($number)
    {
        $factors = [];
/*        if ($number > 1) {
            $factors[] = $number;
//            return [$number];
        }*/

        for ($divisor = 2; $number > 1; $divisor++) {
            for (; $number % $divisor == 0; $number /= $divisor) {
                $factors[] = $divisor;
            }
        }

        return $factors;
    }
}