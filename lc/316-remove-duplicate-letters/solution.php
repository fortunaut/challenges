<?php
class Solution {

  /**
   * @param String $s
   * @return String
   */
  function removeDuplicateLetters($s) {
    $stack = [];
    $seenLetters = [];
    $letterToLastOccurredIndex = [];
    for ($i = 0; $i < strlen($s); $i++) {
      $letter = $s[$i];
      $letterToLastOccurredIndex[$letter] = $i;
    }
    for ($i = 0; $i < strlen($s); $i++) {
      $letter = $s[$i]; 
      $isNewLetter = empty($seenLetters[$letter]);
      if ($isNewLetter) {
        while (
          !empty($stack) 
          && $letter < end($stack)
          && $i < $letterToLastOccurredIndex[end($stack)] // has more top letters after this one
        ) {
            $top = array_pop($stack);
            unset($seenLetters[$top]);
          }
        $seenLetters[$letter] = true;
        $stack[] = $letter;
      } 
    }
    return implode('', $stack);
  }
}

$sol = new Solution();
echo $sol->removeDuplicateLetters("bcabc") . "\n"; // abc
echo $sol->removeDuplicateLetters("cbacdcbc") . "\n"; // acdb
echo $sol->removeDuplicateLetters("ecbacba") . "\n"; // eacb