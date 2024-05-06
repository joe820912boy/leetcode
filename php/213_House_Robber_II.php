<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        if(count($nums) == 1) return $nums[0];
        
        //dp[i]: max money through i house
        // skip n, 0 ~ n-1
        $pickone = array_slice($nums, 0, count($nums) - 1);

        // skip one, 1 ~ n
        $picklast = array_slice($nums, 1);

        return max($this->getMaxMoney($pickone), $this->getMaxMoney($picklast));
    }

    private function getMaxMoney($nums) 
    {
        $dp = array();
        $dp[0] = 0;
        $dp[1] = $nums[0];
        for($i = 2; $i <= count($nums); $i++) {
            $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i - 1]);
        }

        return $dp[count($nums)];
    }
}