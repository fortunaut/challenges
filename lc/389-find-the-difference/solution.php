<?php
class Solution {

  /**
   * @param String $s
   * @param String $t
   * @return String
   */
  function findTheDifference($s, $t) {
      $counts = [];
      for($i = 0; $i < strlen($s); $i++) {
        $letter = $s[$i];
        $counts[$letter] = $counts[$letter] ?? 0;
        $counts[$letter]++;
      }
      for($i = 0; $i < strlen($t); $i++) {
        $letter = $t[$i];
        if (!isset($counts[$letter])) {
          return $letter;
        }
        $counts[$letter]--;
        if ($counts[$letter] < 0) {
          return $letter;
        }
      }
  }
}

$sol = new Solution();
echo $sol->findTheDifference("abcd", "abcde"); // e
echo "\n";
echo $sol->findTheDifference("", "y"); // y
echo "\n";
