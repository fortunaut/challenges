<?php

/*   Definition for a singly-linked list.
 */
class ListNode {
      public $val = 0;
      public $next = null;
      function __construct($val = 0, $next = null) {
          $this->val = $val;
          $this->next = $next;
      }
  }

class Solution {

  /**
   * @param ListNode $l1
   * @param ListNode $l2
   * @return ListNode
   */
  function addTwoNumbers($l1, $l2) {
    $carry = 0;
    while(!is_null($l1) || !is_null($l2) || $carry > 0) {
      $sum = (!empty($l1) ? $l1->val : 0) + (!empty($l2) ? $l2->val : 0) + $carry;
      $carry = intdiv($sum, 10);
      $current = new ListNode($sum % 10);
      if (isset($previous)) {
        $previous->next = $current;
      }
      if (!isset($first)) {         
        $first = $current;
      }
      $previous = $current;
      if (!is_null($l1)) {
        $l1 = $l1->next;
      }
      if (!is_null($l2)) {
        $l2 = $l2->next;
      }
    }
    return $first;
  }

  function printAnswer($l1, $l2) {
    $answer = $this->addTwoNumbers($l1, $l2);
    echo "\nAnswer: ";
    while(!is_null($answer)) {
      echo $answer->val;
      $answer = $answer->next;
    }
    echo "\n";
  }
}

$nodeA = new ListNode(3);
$nodeB = new ListNode(2, $nodeA);
$nodeC = new ListNode(1, $nodeB);

$answer = (new Solution())->printAnswer($nodeC, $nodeA);