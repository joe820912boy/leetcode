<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    

     /**
      * Hint: create two array used to multiply all right and left except itself, 
      * and the return is multlply r[i] and l[i] for each
      *
      * e.g. 
      * origin: [1, 2, 3, 4, 5]
      * l: [1, 1, 2, 6, 24]
      * r: [120, 60, 20, 5, 1]
      * 
      * return: [120, 60, 40, 30, 24]
      */
      function productExceptSelf($nums) {
        $r = array();
        $l = array();
        $s = 1;
        $a_size = count($nums);

        for($i = $a_size - 1; $i >= 0; $i--) {
            if($i == $a_size - 1) {
                $r[$i] = 1;
                continue;
            }            
            $s *= $nums[$i + 1];
            $r[$i] = $s;
        }
        
        $s = 1;
        for($i = 0; $i < $a_size; $i++) {
            if($i == 0) {
                $l[$i] =  $r[$i];
                continue;
            }
            $s *= $nums[$i - 1];
            $l[$i] = $s * $r[$i];
        }

        return $l;
    }

    /**
     * Follow up: Can you solve the problem in O(1) extra space complexity? 
     * (The output array does not count as extra space for space complexity analysis.)
     */ 
    function productExceptSelfO1($nums) {
        $return = array();
        $a_size = count($nums);
        $lproduct = 1;
        $rproduct = 1;
        
        for($i = 0; $i < $a_size; $i++) {
            if($i == 0) {
                $return[$i] = 1;
                continue;
            }
            $lproduct *= $nums[$i - 1];
            $return[$i] = $lproduct;
        }

        for($i = $a_size - 1; $i >= 0; $i--) {
            if($i == $a_size - 1) {
                continue;
            }
            $rproduct *= $nums[$i + 1];
            $return[$i] *= $rproduct;
        }

        return $return;
    }

}