<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $dp = array_fill(0, $m, array_fill(0, $n, 1));

        for($i = 1; $i < $m; $i++) {
            for($j = 1; $j < $n; $j++) {
                $dp[$i][$j] = $dp[$i][$j - 1] + $dp[$i - 1][$j];
            }
        }

        return $dp[$m - 1][$n - 1];
    }


    /**
     * 可發現機器人會向下走m-1，向右走n-1，總計m+n-2
     * 故所有可能其排列組合為 c(m+n-2,m-1)
     */
    function uniquePathsMath($m, $n) {
        $a = 1;
        // c(m+n-2, m-1)
        for($i = 1; $i <= ($m - 1); $i++) {
            $a = $a * ($n - 1 + $i) / ($i);
        }
        return $a;
    }

}