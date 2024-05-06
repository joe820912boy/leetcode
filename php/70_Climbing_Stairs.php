<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        // n = (n-1) + (n-2)
        $r = array_fill(0, $n, 0);
        $r[0] = 1;
        $r[1] = 2;

        for($i = 2; $i < $n; $i++) {
            $r[$i] = $r[$i - 1] + $r[$i - 2];
        }
        return $r[$n-1];
    }
}