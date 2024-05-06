<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        $dp = array_fill(0, count($nums), 1);

        for($i = 0; $i < count($nums); $i++) {
            for($j = $i + 1; $j < count($nums); $j++) {
                if($nums[$j] > $nums[$i]) {
                    $dp[$j] = max($dp[$j], $dp[$i] + 1);
                }
            }
        }

        return (max($dp));
    }

    function lengthOfLISBS($nums) {
        $r = array();
        $len = 1;
        $r[0] = $nums[0];

        foreach($nums as $n) {

            if($n > $r[$len - 1]) {
                $r[$len++] = $n;
                continue;
            }

            $left = 0;
            $right = count($r) - 1;
            while($left < $right) {
                $mid = (int)(($left + $right) / 2);
                if($n <= $r[$mid])
                    $right = $mid;
                else
                    $left = $mid + 1;
            }

            if($n < $r[$left]) {
                $r[$left] = $n;
            }
        }

        return count($r);
    }

}