<?php

namespace App\Enum;

class Run
{
    const ZERO = "00";
    const SIX = "06";
    const DOUZE = "12";
    const DIXHUIT = "18";

    public function getRunByHour(string $hour): string
    {
        if ($hour <= 8) {
            return self::ZERO;
        } else if ($hour <= 12) {
            return self::SIX;
        } else if ($hour <= 18) {
            return self::DOUZE;
        } else {
            return self::DIXHUIT;
        }
    }
}