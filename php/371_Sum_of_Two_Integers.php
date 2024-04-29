<?php

class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function getSum($a, $b) {
        if($a === 0) return $b;
        if($b === 0) return $a;

        while($b != 0) {
            $carry = ($a & $b);
            $a = $a ^ $b;
            $b = $carry << 1; //carry
        }
        return $a;
    }
}