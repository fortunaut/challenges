<?php
class Solution {

/**
 * @param String $customers
 * @return Integer
 */
function bestClosingTime($customers) {
    $bestClosingTime = 0;
    $bestPenalty = 0;
    $currentPenalty = 0;
    for($i = 0; $i < strlen($customers); $i++) {
      if($customers[$i] === 'N') {
        $currentPenalty++;
      } else { // we have a customer
        $currentPenalty--;
      }
      if ($currentPenalty < $bestPenalty) {
        $bestClosingTime = $i+1;
        $bestPenalty = $currentPenalty;
      }
    }
    return $bestClosingTime;
}

/**
 * @param String $customers
 * @return void
 */
function printAnswer($customers) {
  $answer = $this->bestClosingTime($customers);
  printf("%d\n", $answer);
}
}

$soln = new Solution();
$soln->printAnswer("YYNY"); // 2
$soln->printAnswer("NNNNN"); // 0
$soln->printAnswer("YYYY"); // 4
echo "\n";
