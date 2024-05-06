<?php

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n) {
        
        $rb = '';
        for($i = 0; $i < 32; $i++) {
            $rb .= $n & 1;
            $n = $n >> 1;
        }

        return bindec($rb);
    }
}