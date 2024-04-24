<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {

        $rindex = count($nums) - 1;
        $lindex = 0;

        while($rindex >= $lindex) {
            $mindex = (int)(($rindex + $lindex) / 2);
            if($target === $nums[$mindex])
                return $mindex;
            
            if($nums[$mindex] > $target) {
                $rindex = $mindex - 1;
            } else {
                $lindex = $mindex + 1;
            }
        }
        
        return -1;
    }
}