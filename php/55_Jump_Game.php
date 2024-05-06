<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        if(count($nums) == 1) return true;

        $len = count($nums);
        $max = 0; // record the max index we could reach
        for($i = 0; $i < $len; $i++) {
            // means we could reach the current index
            if($i > $max) return false;
            $max = max($max, $i + $nums[$i]);
        }
        
        return $max >= count($nums) - 1;
    }
}