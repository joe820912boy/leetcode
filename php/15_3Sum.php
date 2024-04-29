<?php 
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        if(count($nums) < 3) return [];

        $r = array();
        sort($nums);
        for($i = 0; $i < count($nums); $i++) {
            // skip the same value
            if($i > 0 && $nums[$i] == $nums[$i - 1])
                continue;

            $j = $i + 1;
            $k = count($nums) - 1;
            $target = 0 - $nums[$i];
            while($j < $k) {
                $sum = $nums[$j] + $nums[$k];
                if($sum == $target) {
                    // find answer
                    $r[] = [$nums[$i], $nums[$j], $nums[$k]];

                    // skip the same value
                    while($j < $k && $nums[$j] == $nums[$j + 1]) $j++;
                    while($j < $k && $nums[$k] == $nums[$k - 1]) $k--;
                    $j++;
                    $k--;
                } else if($sum < $target) {
                    // need more
                    $j++;
                } else if ($sum > $target) {
                    // too more
                    $k--;
                }
            }
        }
        return ($r);
    }
}