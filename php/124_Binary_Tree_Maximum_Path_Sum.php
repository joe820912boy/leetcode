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
     * @return Integer
     */

    private $global_max = PHP_INT_MIN;

    function maxPathSum($root) {
        if(!$root) return 0;

        $this->dfsMax($root);
        return $this->global_max;
    }

    private function dfsMax($root)
    {
        if(!$root) return 0;

        // if right less than 0, then we set it to 0        
        $right = max($this->dfsMax($root->right), 0);
        $left = max($this->dfsMax($root->left), 0);
        $local_max = $root->val + $right + $left;

        $this->global_max = max($local_max, $this->global_max);

        // get the max of current node with right or left child
        // we could only get one direction: left->root or right->root
        return $root->val + max($right, $left);
    }
}