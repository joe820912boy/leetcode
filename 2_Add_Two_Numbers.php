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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {

        $r = new ListNode();
        $p = $r;
        $carry = 0;
        while(!empty($l1) || !empty($l2) || !empty($carry)) {
            $num = $carry + $l1->val + $l2->val;
            if($num >= 10) {
                $r->next = new ListNode($num - 10);
                $carry = 1;
            } else {
                $r->next = new ListNode($num);
                $carry = 0;
            }
            $l1 = $l1->next;
            $l2 = $l2->next;
            $r = $r->next;
        }
        return ($p->next);
    }
}