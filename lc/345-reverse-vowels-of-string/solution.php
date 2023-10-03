<?php 

class Solution {

const VOWELS = ['a','e','i','o','u','A','E','I','O','U'];

  /**
   * @param String $s
   * @return String
   */
  function reverseVowels($s) {
    $vowels = [];
    for($i = 0; $i < strlen($s); $i++) {
      if (in_array($s[$i], self::VOWELS)) {
        array_unshift($vowels, $s[$i]);
      }
    }
    for($i = 0; $i < strlen($s); $i++) {
      if (in_array($s[$i], self::VOWELS)) {
        $s[$i] = array_shift($vowels);
      }
    }
    return $s;
  }
}

$sol = new Solution();

printf("%s\n", $sol->reverseVowels('hello')); // holle
printf("%s\n", $sol->reverseVowels('leetcode')); // leotcede
