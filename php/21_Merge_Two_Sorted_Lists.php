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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {        
        $head = new ListNode();
        $tail = $head;

        while($list1 != NULL && $list2 != NULL) {
            if($list1->val <= $list2->val) {
                $tail->next = $list1;
                $list1 = $list1->next;
            } else {
                $tail->next = $list2;
                $list2 = $list2->next;
            }
            $tail = $tail->next;

        }

        if(empty($list1)) {
            $tail->next = $list2;
        }
        if(empty($list2)) {
            $tail->next = $list1;
        }

        return $head->next;
    }
}