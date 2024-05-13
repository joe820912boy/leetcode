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
     * @param TreeNode $subRoot
     * @return Boolean
     */
    function isSubtree($root, $subRoot) {
        if($root === NULL) return false;
        if($subRoot === NULL) return true;

        if($this->isSame($root, $subRoot)) return true;

        return $this->isSubtree($root->right, $subRoot) || $this->isSubtree($root->left, $subRoot);
    }

    private function isSame($root, $subroot)
    {
        if($root === NULL && $subroot === NULL) return true;
        if($root === NULL || $subroot === NULL) return false;

        return ($root->val == $subroot->val) && 
                $this->isSame($root->right, $subroot->right) &&
                $this->isSame($root->left, $subroot->left);
    }
}