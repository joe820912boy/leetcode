<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

 class Codec {
    function __construct() {

    }
  
    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        if(!$root) {
            return;
        }
        $res = array();
        $this->_serialize($root, $res);

        return implode(',', $res);
    }

    private function _serialize($root, &$res)
    {
        if($root) {
            $res[] = $root->val;
            $this->_serialize($root->left, $res);
            $this->_serialize($root->right, $res);
        } else {
            $res[] = '?';
        }
    }
  
    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        if(empty($data)) return [];

        $datas = explode(',', $data);
        return $this->_deserialize($datas);
    }

    private function _deserialize(&$datas)
    {
        $val = array_shift($datas);

        if($val === '?') {
            return null;
        }

        $node = new TreeNode($val);
        $node->left = $this->_deserialize($datas);
        $node->right = $this->_deserialize($datas);

        return $node;
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = Codec();
 * $deser = Codec();
 * $data = $ser->serialize($root);
 * $ans = $deser->deserialize($data);
 */