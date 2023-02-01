<?php

namespace App\Enum;

class Term
{
    /**
     * @return array
     */
    public function getTerm(): array
    {
        $terms = [];

        /** 001h to 120h */
        for ($i=1;$i<=120;$i++) {
            if (strlen($i) === 1) {
                $terms[] = "00".$i;
            } else if(strlen($i) === 2) {
                $terms[] = "0".$i;
            } else {
                $terms[] = $i;
            }
        }

        /** 123h to 384h */
        for ($i=123; $i<=384; $i=$i+3) {
            $terms[] = $i;
        }

        return $terms;
    }
}