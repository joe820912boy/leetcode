<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $size = count($nums);
        $dp = array_fill(0, count($nums) + 1, 0);
        $dp[0] = 0;
        $dp[1] = $nums[0];

        for($i = 2; $i <= $size; $i++) {
            $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i - 1]);
        }

        return $dp[$size];
    }
}