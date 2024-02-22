<?php 

class Solution {

/**
 * @param Integer $left
 * @param Integer $right
 * @return Integer
 */
public function rangeBitwiseAnd($left, $right) {
  $c = 0;
  while ($right !== $left) {
    $left = $left >> 1;
    $right = $right >> 1;
    $c++;
  }
  return $left << $c;
}
}

$s = new Solution();

echo $s->rangeBitwiseAnd(5, 7);
echo "\n";
echo $s->rangeBitwiseAnd(0, 0);
echo "\n";
echo $s->rangeBitwiseAnd(1, 2147483647);
echo "\n";
echo $s->rangeBitwiseAnd(1, 2);
echo "\n";
echo $s->rangeBitwiseAnd(700000000, 2147483641);
echo "\n";