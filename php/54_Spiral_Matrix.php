<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        return $this->spiralOrderRecursive($matrix);
    }

    private function spiralOrderRecursive($matrix, $ans = [])
    {

        $ans = array_merge($ans, $matrix[0]);
        array_shift($matrix);
        if(empty($matrix))
            return $ans;

        return $this->spiralOrderRecursive($this->rotateCounterClock($matrix), $ans);
    }

    private function rotateCounterClock($matrix)
    {
        $row = count($matrix);
        $col = count($matrix[0]);
        $rotate = array();

        // reverse every row
        for($i = 0; $i < $row; $i++) {
            for($j = 0; $j < $col / 2; $j++) {
                $tmp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$i][$col - $j - 1];
                $matrix[$i][$col - $j - 1] = $tmp;
            }
        }

        for($i = 0; $i < $row; $i++) {
            for($j = 0; $j < $col; $j++) {
                $rotate[$j][$i] = $matrix[$i][$j];
            }
        }

        return $rotate;
    }
}


class SolutionII {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        if(empty($matrix)) return;

        $ans = array();
        $rowStart = 0;
        $rowEnd = count($matrix) - 1;
        $colStart = 0;
        $colEnd = count($matrix[0]) - 1;

        while($rowStart <= $rowEnd && $colStart <= $colEnd) {
            // right
            for($i = $colStart; $i <= $colEnd; $i++) {
                $ans[] = $matrix[$rowStart][$i];
            }
            $rowStart++;

            // down
            for($i = $rowStart; $i <= $rowEnd; $i++) {
                $ans[] = $matrix[$i][$colEnd];
            }
            $colEnd--;

            // left
            if($rowEnd >= $rowStart) {
                for($i = $colEnd; $i >= $colStart; $i--) {
                    $ans[] = $matrix[$rowEnd][$i];
                }
                $rowEnd--;
            }

            // top
            if($colEnd >= $colStart) {
                for($i = $rowEnd; $i >= $rowStart; $i--) {
                    $ans[] = $matrix[$i][$colStart];
                }
                $colStart++;
            }
        }

        return ($ans);
    }
}