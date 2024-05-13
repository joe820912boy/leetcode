<?php
class Solution {

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval) {
        if(empty($intervals)) return [$newInterval];

        $new_l = $newInterval[0];
        $new_r = $newInterval[1];
        $ans = array();
        $inserted = false; // use flag to check the new interval inserted or not

        foreach($intervals as $i) {
            if($new_r < $i[0]) {
                if(!$inserted) {
                    $ans[] = [$new_l, $new_r];
                    $inserted = true;
                }
                $ans[] = $i;
            } else if ($new_l > $i[1]) {
                $ans[] = $i;
            } else {
                $new_l = min($new_l, $i[0]);
                $new_r = max($new_r, $i[1]);
            }
        }
        
        if(!$inserted) {
            $ans[] = [$new_l, $new_r];
        }

        return ($ans);
    }
}