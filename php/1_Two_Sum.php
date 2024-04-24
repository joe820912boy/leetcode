<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $result = array();
        for($i = 0; $i < count($nums); $i++) {
            $remain = $nums;
            unset($remain[$i]);
            $diff = $target - $nums[$i];

            if($index = array_keys($remain, $diff)) {
                if(count($index) > 1)
                    return $index;

                $result= $index;
                $result[] = $i;
                return $result;
            }
        }
    }
}