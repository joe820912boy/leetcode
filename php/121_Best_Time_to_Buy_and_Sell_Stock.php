<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $max = 0;
        $cheapest = $prices[0];

        for($i = 0; $i < count($prices); $i++) {
            if($prices[$i] < $cheapest)
                $cheapest = $prices[$i];

            $p = $prices[$i] - $cheapest;
            $max = ($p > $max) ? $p : $max;
        }
        return $max;
    }
}