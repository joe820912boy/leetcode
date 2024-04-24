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
     * @param TreeNode $root
     * @return String[][]
     */
    function printTree($root) {
        $depth = ($this->findDepth($root));
        $width = 2 ** $depth -1;
        $res = array_fill(0, $depth, array_fill(0, $width, ""));
        $this->addValue($root, $res, 0, 0, $width - 1);

        return $res;
    }

    private function addValue($root, &$res, $depth, $right, $left)
    {
        if(empty($root))
            return;

        $pos = (int)(($right + $left) / 2);
        $res[$depth][$pos] = strval($root->val);
        $this->addValue($root->left, $res, $depth + 1, $right, $pos - 1);
        $this->addValue($root->right, $res, $depth + 1, $pos + 1, $left);
    }

    private function findDepth($root) 
    {
        if(empty($root))
            return 0;

        return 1 + max($this->findDepth($root->left), $this->findDepth($root->right));
    }
}