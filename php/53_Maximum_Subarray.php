<?php
class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxSubArray($nums) {
    if(empty($nums)) return 0;
    if(count($nums) == 1) return $nums[0];

    $max = $nums[0];
    $cur = 0;
    for($i = 0; $i < count($nums); $i++) {
        $cur = max($cur, 0);
        $cur += $nums[$i];
        $max = max($cur, $max);
    }
    return $max;
}
}