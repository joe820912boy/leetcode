<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $a_size = count($nums);
        $l = 0;
        $r = $a_size - 1;

        while($l < $r) {
            $middle = (int) (($r + $l) / 2);

            if($nums[$r] < $nums[$middle])
                $l = $middle + 1;
            else
                $r = $middle;

        }
        
        return $nums[$l];
    }
}