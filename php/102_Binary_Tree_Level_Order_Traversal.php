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
     * @return Integer[][]
     */
    function levelOrder($root) {
        $res = array();
        $dep = 0;
        $this->calOrder($root, $res, $dep);
        return $res;
    }

    private function calOrder($root, &$res, $dep)
    {
        if(!$root) return [];

        $res[$dep][] = $root->val;
        $dep++;
        $this->calOrder($root->left, $res, $dep);
        $this->calOrder($root->right, $res, $dep);
    }
}