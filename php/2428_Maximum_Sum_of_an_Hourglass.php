<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxSum($grid) {
        $max = $i = 0;
        $round = count($grid) - 3 + 1;
        
        while($round > 0) {
            $sub_grid = array_slice($grid, $i, 3);
            $j = 0;
            for($k = 0; $k < count($sub_grid[0]) - 3 + 1; $k++) {
                $t_t_matrix = array();
                
                foreach($sub_grid as $s) {
                    $d = array_slice($s, $j, 3);
                    $t_t_matrix[] = $d;
                }
                $j++;
                $hour = array_sum($t_t_matrix[0]) + $t_t_matrix[1][1] + array_sum($t_t_matrix[2]);
                $max = max($hour, $max);
            }
            $i++;
            $round--;
        }
        return $max;
    }
}