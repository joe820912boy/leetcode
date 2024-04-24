<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */

     // O(n^2)
    function maxArea($height) {

        if(empty($height))
            return NULL;

        $max = 0;
        for($i = 0; $i < count($height); $i++) {
            for($j = $i + 1; $j < count($height); $j++) {
                $max = max($max, min($height[$i], $height[$j]) * ($j - $i) );
            }
        }
        return $max;
    }

    function maxArea_fast($height) {

        if(empty($height))
            return NULL;

        $count = count($height);
        $max = 0;
        $i = 0;
        $j = $count - 1;

        while($i < $j) {
            if($height[$i] < $height[$j]) {
                $area = $height[$i] * ($j - $i);
                $i++;
            } else {
                $area = $height[$j] * ($j - $i);
                $j--;
            }
            if($area > $max) 
                $max = $area;
        }
        
        return $max;
    }
}