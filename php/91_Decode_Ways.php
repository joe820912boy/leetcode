<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    
    function numDecodings($s) {
        if($s[0] === '0') return 0;

        $len = strlen($s);
        $dp = array_fill(0, $len + 1, 0);
        $dp[0] = 1;

        for($i = 1; $i <= $len; $i++) {
            if($s[$i - 1] == '0') {
                if($s[$i - 2] != '1' && $s[$i - 2] != '2') return 0;
                $dp[$i] = $dp[$i - 2];
            } else if($s[$i - 2] == '1' || ($s[$i - 2] == '2' && $s[$i - 1] <= '6')) {
                $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
            } else {
                $dp[$i] = $dp[$i - 1];
            }
        }

        return $dp[$len];
    }
}