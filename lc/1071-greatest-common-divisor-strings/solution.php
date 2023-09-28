<?php
class Solution {

  /**
   * 
   * 
   * @param String $str1
   * @param String $str2
   * @param int    $substrLength
   * 
   * @return bool Whether the substring of length $subStrLength divides both str1 and str2 evenly
   */
  private function substrDividesInto($str1, $str2, $substrLength) {
    $substr = substr($str1, 0, $substrLength);
    for ($i = 0; $i < max(strlen($str1), strlen($str2)); $i += $substrLength) {
      if ($i < strlen($str1)) {
        $substr1 = substr($str1, $i, $substrLength);
      }
      if ($i < strlen($str2)) {
        $substr2 = substr($str2, $i, $substrLength);
      }
      if ($substr !== $substr1 || $substr1 !== $substr2) {
        return false;
      }
    }
    return true;
  }

  /**
   * @param int $n
   * @param int $m
   * @return array of common divisors in descending order
   */
  private function getCommonDivisors($n, $m) {
    $biggerNum = max($n, $m);
    $smallerNum = min($n, $m);
    $answer = [];
    for($i = $smallerNum; $i > 0; $i--) {
      if ($biggerNum % $i == 0) {        
        $answer[] = $i;
      }
    }
    return $answer;
  }

  /**
   * @param String $str1
   * @param String $str2
   * @return String
   */
  function gcdOfStrings($str1, $str2) {
      $commonDivisors = $this->getCommonDivisors(strlen($str1), strlen($str2));
      foreach($commonDivisors as $divisor) {
        if (
          $this->substrDividesInto(
            $str1,
            $str2,
            $divisor
          )
        ) {
          return substr($str1, 0, $divisor);
        }
      }
      return '';
  }
}
$sol = new Solution();
printf("answer: %s\n", $sol->gcdOfStrings("ABCABC","ABC")); // 'ABC'
printf("answer: %s\n", $sol->gcdOfStrings("ABABAB","ABAB")); // 'AB'
printf("answer: %s\n", $sol->gcdOfStrings("LEET","CODE")); // ''