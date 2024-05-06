<?php

class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        if($text1 === $text2) return strlen($text1);
        if(empty($text1) || empty($text2)) return 0;

        $dp = array();
        $l1 = strlen($text1);
        $l2 = strlen($text2);

        for($i = 0; $i < $l1; $i++) {
            for($j = 0; $j < $l2; $j++) {
                if($text1[$i] === $text2[$j])
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                else {
                    $max = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
                    $dp[$i][$j] = is_null($max) ? 0 : $max;
                }
            }
        }
        
        return ($dp[$l1 - 1][$l2 - 1]);
    }
}