<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function partitionString($s) {
        if(strlen($s) == 1) return 1;

        $s_arr = str_split($s);
        $substr = ''; 
        $result = array();
        foreach($s_arr as $s) {
            
            if(strpos($substr, $s) === false) {
                $substr .= $s;
            } else {
                $result[] = $substr;
                $substr = $s;
            }
        }
        if(!empty($substr))
            $result[] = $substr;

        return count($result);
    }
}