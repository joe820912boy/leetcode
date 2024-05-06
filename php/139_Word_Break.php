<?php

class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
        $dp = array_fill(0, strlen($s) + 1, false);
        $dp[0] = true;
        $len = strlen($s);

        for($i = 0; $i < $len; $i++) {
            for($j = $i + 1; $j <= $len; $j++) {
                $suf = substr($s, $i, $j - $i);

                // check the remaining string in dict
                if(in_array($suf, $wordDict) && $dp[$i]) {
                    $dp[$j] = true;
                    if($dp[$len]) return true;
                }
            }
        }

        return false;
    }
}