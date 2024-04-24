<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {

        if(strlen($s) == 0) return 0;
        if(strlen($s) == 1) return 1;
        
        $length = 0;
        $s_arr = str_split($s);
        $r = array();
        $i = 0;

        for($i = 0; $i < count($s_arr); $i++) {
            if(!in_array($s_arr[$i], $r)) {
                $r[] = $s_arr[$i];
            } else {
                do{
                    array_shift($r);
                } while(in_array($s_arr[$i], $r));
                $r[] = $s_arr[$i];
            }

            $length = max($length, count($r));
        }

        return $length;
    }
}