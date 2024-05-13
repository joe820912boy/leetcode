<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        if(count($intervals) <= 1) return $intervals;
        
        // sort intervals by left bound
        usort($intervals, function($a, $b) {
            return $a[0] - $b[0];
        });

        $merge = array();
        $merge[] = $intervals[0];

        for($i = 1; $i < count($intervals); $i++) {
            $lastMergeBound = &$merge[count($merge) - 1][1]; //get last element of merge with right bound
            // [1,3] merge with [2,6], so we need update lastMergeBound = max(3,6) 
            if($intervals[$i][0] <= $lastMergeBound) {
                $lastMergeBound = max($lastMergeBound, $intervals[$i][1]);
            } else {
                $merge[] = $intervals[$i];
            }
        }

        return ($merge);
    }
}