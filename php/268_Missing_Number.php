<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        $count = count($nums) + 1;
        $r = array_fill(0, $count, 0);

        foreach($nums as $n) {
            $r[$n]++;
        }
        
        return array_search(0, $r);
    }

    function missingNumberBitOperator($nums) {
        /**
         * hint: XOR 
         * where a ^ b if a != b is true and a == b is false
         * so after xor the number in $nums and xor from 0 ~ count($nums) we will get the missing number  
         */
        $xor = 0;
        foreach($nums as $n) 
            $xor = $xor ^ $n;

        for($i = 0; $i <= count($nums); $i++)
            $xor = $xor ^ $i;

        return $xor; 
    }

}