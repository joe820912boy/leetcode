<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        if(count($nums) == 1) return $nums[0];
        
        $global_max = $local_min = $local_max = $nums[0];
        
        for($i = 1; $i < count($nums); $i++) {
            $cur = $nums[$i];
            if($cur < 0) {
                $temp = $local_min;
                $local_min = $local_max;
                $local_max = $temp;
            }
            
            $local_min = min($cur, $local_min * $cur);
            $local_max = max($cur, $local_max * $cur);
            $global_max = max($global_max, $local_max);

        }

        return $global_max;
    }
}