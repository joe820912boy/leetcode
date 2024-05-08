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
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $p = NULL;
        $q = $head;

        while($q != NULL) {
            $temp = $q;
            $q = $q->next;
            $temp->next = $p;
            $p = $temp;
        }

        return ($p);

    }
}