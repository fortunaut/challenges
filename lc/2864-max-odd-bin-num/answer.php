<?php 
class Solution {

  function swap(&$s, $i, $j) {
      $temp = $s[$i];
      $s[$i] = $s[$j];
      $s[$j] = $temp;
  }

  /**
   * @param String $s
   * @return String
   */
  function maximumOddBinaryNumber($s) {
      $len = strlen($s);
      $leftPointer = 0;
      for ($i = 0; $i < $len-1; $i++) {
          if($s[$i] == '1') {
              if($s[$len-1] == '0') {
                  $this->swap($s, $i, $len-1);
              } else {
                  $this->swap($s, $leftPointer, $i);
                  $leftPointer++;
              }
          }
      }
      return $s;
  }
}