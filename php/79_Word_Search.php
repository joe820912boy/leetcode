<?php

class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        $row = count($board);
        $col = count($board[0]);
        $visted = array_fill(0, $row, array_fill(0, $col, false));
        
        for($i = 0; $i < $row; $i++) {
            for($j = 0; $j < $col; $j++) {
                if($this->dfs($board, $i, $j, $visited, 0, $word))
                    return true;
            }
        }

        return false;
    }

    private function dfs($board, $row, $col, &$visited, $w_index, $word)
    {
        // check bound
        if($row < 0 || $row >= count($board) || $col < 0 || $col >= count($board[0]))
            return false;

        // if visited or the cur chat != word
        if($visited[$row][$col] || $board[$row][$col] !== $word[$w_index])
            return false;

        // if we get the last char, than we found it
        if($w_index == (strlen($word) - 1))
            return true;

        $visited[$row][$col] = true;

        if ($this->dfs($board, $row, $col - 1, $visited, $w_index + 1, $word) || // up
            $this->dfs($board, $row, $col + 1, $visited, $w_index + 1, $word) || // down
            $this->dfs($board, $row - 1, $col, $visited, $w_index + 1, $word) || // left
            $this->dfs($board, $row + 1, $col, $visited, $w_index + 1, $word)    // right
            ) return true;

        $visited[$row][$col] = false;
        return false;
    }
}