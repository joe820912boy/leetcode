<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function constructMaximumBinaryTree($nums) {
        if(empty($nums))
            return NULL;

        $lpart = NULL;
        $rpart = NULL;

        $maxIndex = $this->findMaxIndex($nums);
        $lpart = array_slice($nums, 0, $maxIndex);
        $rpart = array_slice($nums, $maxIndex + 1, count($nums));

        $r = new TreeNode($nums[$maxIndex]);
        $r->right = $this->constructMaximumBinaryTree($rpart);
        $r->left = $this->constructMaximumBinaryTree($lpart);
        
        return $r;
    }

    private function findMaxIndex($array) {
        if(empty($array))
            return NULL;

        $max = NULL;
        $index = -1;
        for($i = 0; $i < count($array); $i++) {
            if($i == 0) {
                $max = $array[$i];
                $index = 0;
            }

            if($max >= $array[$i]) {
                continue;
            } else {
                $max = $array[$i];
                $index = $i;
            }
        }
        
        return $index;
    }
}