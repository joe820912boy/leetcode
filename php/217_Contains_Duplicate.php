<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $r = array();
        foreach($nums as $n) {
            if(isset($r[$n]))
                return true;

            $r[$n] = 0;
        }
        return false;
    }
}