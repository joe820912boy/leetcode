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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        if($head === NULL) return;
        $h = $head;
        $count = 0;
        
        while($h != NULL) {
            $count++;
            $h = $h->next;
        }

        $prev = NULL;
        $tmp = $head;
        if(($r_index = $count - $n) == 0) return $head->next; // remove the fisrt node
        while($r_index > 0) {
            $prev = $tmp;
            $tmp = $tmp->next;
            $r_index--;
        }

        $prev->next = $tmp->next;
        return $head;
    }
}