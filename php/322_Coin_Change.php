<?php
class Solution {

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) {
        if($amount == 0) return 0;

        $dp = array_fill(0, $amount + 1, PHP_INT_MAX);
        $dp[0] = 0;

        for($i = 1; $i <= $amount; $i++) {
            foreach($coins as $coin) {
                if($coin > $i) // means that coin couldn't compose the amount
                    continue;
                
                $dp[$i] = min($dp[$i], 1 + $dp[$i - $coin]);
            }
        }

        return ($dp[$amount] === PHP_INT_MAX ? -1 : $dp[$amount]);
    }
}