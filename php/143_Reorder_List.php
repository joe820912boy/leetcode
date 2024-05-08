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
     * @return NULL
     */
    function reorderList($head) {
        if($head === NULL || $head->next === NULL) return $head; // only one node

        $fast = $slow = $head;
        $list1 = $list2 = NULL;

        while($fast->next !== NULL) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $list2 = $slow; // from middle to end

        $tmp = $head;
        while($tmp->next !== $slow) {
            $tmp = $tmp->next;
        }
        $tmp->next = NULL;
        $list1 = $head; // from head to middle
        
        // reverse list2
        $list2 = $this->reverserList($list2);

        return $this->mergeList($list1, $list2);
    }

    private function reverserList(&$list) 
    {
        $p = null;
        $q = $list;
        while($q !== NULL) {
            $temp = $q;
            $q = $q->next;
            $temp->next = $p;
            $p = $temp;
        }

        return $p;
    }

    private function mergeList(&$list1, &$list2) : ListNode
    {
        $ans = new ListNode();
        $tail = $ans;
        while($list1 !== NULL && $list2 !== NULL) {
            $tail->next = $list1;
            $list1 = $list1->next;
            $tail = $tail->next;

            $tail->next = $list2;
            $list2 = $list2->next;
            $tail = $tail->next;
        }

        if($list1 === NULL) $tail->next = $list2;
        if($list2 === NULL) $tail->next = $list1;

        return $ans->next;
    }
}