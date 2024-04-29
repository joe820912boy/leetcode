<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        $r = array();
        $r[0] = 0;

        for($i = 1; $i <= $n; $i++) {
            // i/2: 00XXXXXXX XXXXXXXX XXXXXXXX XXXXXXX 
            // i:   0XXXXXXX XXXXXXXX XXXXXXXX XXXXXXX0
            // where i (number of 1 in bits) = i/2 + (last bit & 1)
            $r[$i] = $r[$i / 2] + ($i & 1);
        }

        return $r;
    }
}