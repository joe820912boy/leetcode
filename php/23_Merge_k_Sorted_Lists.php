<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $ans = new ListNode();
        $tail = $ans;

        while(true) {
            $min = PHP_INT_MAX;
            $min_index = NULL;
            $is_break = true;

            // traverse all list and find the min and min_index
            for($i = 0; $i < count($lists); $i++) {
                $head = $lists[$i];
                if($head != NULL) {
                    if($head->val < $min) {
                        $min = $head->val;
                        $min_index = $i;
                    }
                    $is_break = false;
                }
            }

            if($is_break)
                return $ans->next;

            $tail->next = $lists[$min_index];
            $tail = $tail->next;
            $lists[$min_index] = $lists[$min_index]->next;
        }
    }
}