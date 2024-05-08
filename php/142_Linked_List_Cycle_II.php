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
     * @return ListNode
     */
    function detectCycle($head) {
        $slow = $fast = $head;
        $is_cycle = false;

        while($fast !== NULL && $fast->next !== NULL) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if($fast === $slow) {
                $is_cycle = true;
                break;
            }
        }
        if(!$is_cycle)
            return false;
            
        // the cycle node (c): distance from head to c = distance from meating node to c 
        $cur = $head;
        while($cur !== $slow) {
            $cur = $cur->next;
            $slow = $slow->next;
        }
        return $cur;
    }
}