<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

 class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if($head->next == NULL) return false;

        //Floyd's Cycle Detection Algorithm
        $fast = $slow = $head;

        while($fast != NULL) {
            $fast = $fast->next->next;
            $slow = $slow->next;

            if($fast === $slow) return true;
        }

        return false;

    }
}