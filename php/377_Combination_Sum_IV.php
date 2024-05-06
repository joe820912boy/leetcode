<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function combinationSum4($nums, $target) {
        $dp = array_fill(0, $target + 1, 0);
        $dp[0] = 1;
        // target = num + $dp[$target - $num] (for all num <= $target)

        for($i = 1; $i <= $target; $i++) {
            for($j = 0; $j < count($nums); $j++) {
                if($i >= $nums[$j])
                    $dp[$i] = $dp[$i] + $dp[$i - $nums[$j]];
            }
        }

        return $dp[$target];
    }
}