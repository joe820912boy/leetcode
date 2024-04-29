<?php


class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $count = 0;
        
        while($n != 0) {
            if($n % 2 == 1)
                $count++;

            $n = $n / 2;
        }
        return $count;
    }

    function hammingWeightFast($n) {
        $count = 0;
        
        while($n != 0) {
            if($n & 1 == 1)
                $count++;

            $n = $n >> 1;
        }
        return $count;
    }

}