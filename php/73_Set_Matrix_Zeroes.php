<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        if(empty($matrix)) return;

        $row = count($matrix);
        $col = count($matrix[0]);
        $set = array();
        for($i = 0; $i < $row; $i++) {
            for($j = 0; $j < $col; $j++) {
                
                // set zero
                if($matrix[$i][$j] == 0) {
                    $set[] = [$i, $j];
                } 
            }
        }

        foreach($set as $s) {
            $r = $s[0];
            $c = $s[1];
            for($i = 0; $i < $row; $i++) {
                for($j = 0; $j < $col; $j++) {
                    if($i == $r || $j == $c) {
                        $matrix[$i][$j] = 0;
                    }
                }
            }
        }
    }
}

class SolutionII {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        if(empty($matrix)) return;

        $row = count($matrix);
        $col = count($matrix[0]);
        $rowZero = false;
        $colZero = false;

        // first col
        for($i = 0; $i < $row; $i++) {
            if($matrix[$i][0] == 0)
                $colZero = true;
        }

        // first row
        for($i = 0; $i < $col; $i++) {
            if($matrix[0][$i] == 0)
                $rowZero = true;
        }

        // update first col and row
        for($i = 1; $i < $row; $i++) {
            for($j = 1; $j < $col; $j++) {
                if($matrix[$i][$j] == 0) {
                    $matrix[$i][0] = 0;
                    $matrix[0][$j] = 0;
                }
            }
        }

        // update element if first row or col has zero
        for($i = 1; $i < $row; $i++) {
            for($j = 1; $j < $col; $j++) {
                if($matrix[$i][0] == 0 || $matrix[0][$j] == 0)
                    $matrix[$i][$j] = 0;
            }
        }

        // update by flag
        if($colZero) {
            for($i = 0; $i < $row; $i++)
                $matrix[$i][0] = 0;
        }

        if($rowZero) {
            for($i = 0; $i < $col; $i++)
                $matrix[0][$i] = 0;
        }
    }
}