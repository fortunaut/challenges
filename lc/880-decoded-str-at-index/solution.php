<?php
class Solution {

  /**
   * @param String $s
   * @param Integer $k
   * @return String
   */
  function decodeAtIndex($s, $k) {
      // Find the decoded length
      $decodedLength = 0;
      for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (is_numeric($char)) {
          $decodedLength *= $char;
        } else {
          // it's a character
          $decodedLength++;
        }
      }
      // Traverse $s backwards. Keep track of decoded size.
      // - If char is a digit, then decodedLength = intdiv(decodedLength, digit)
      // - If $k = 0, return char 
      for ($i = strlen($s)-1; $i >= 0; $i--) {
        $k = $k % $decodedLength;
        $char = $s[$i];
        if ($k == 0 && !is_numeric($char)) {
          return $char;
        }
        if (is_numeric($char)) {
          $decodedLength = intdiv($decodedLength, $char);
        } else {
          // Else $char is a alphabetical character
          $decodedLength--;
        }
      }
  }
}

$sol = new Solution();
// echo $sol->decodeAtIndex('leet2code3', 10) . "\n"; // o
// echo $sol->decodeAtIndex('ha22', 5) . "\n"; // h
// echo $sol->decodeAtIndex('a2b3c4d5e6f7g8h9', 10) . "\n"; // c, aabaabaabc
echo $sol->decodeAtIndex('a2345678999999999999999', 1) . "\n"; // a
echo $sol->decodeAtIndex('a23', 6) . "\n"; // a