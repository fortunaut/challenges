<?php 
class Solution {

  function isMonotonicIncreasing($nums) {
    foreach ($nums as $num) {
      if (!isset($prev)) {
        $prev = $num;
        continue;
      }
      if ($prev > $num) {
        return false;
      }
      $prev = $num;
    }
    return true;
  }

  function isMonotonicDecreasing($nums) {
    foreach ($nums as $num) {
      if (!isset($prev)) {
        $prev = $num;
        continue;
      }
      if ($prev < $num) {
        return false;
      }
      $prev = $num;
    }
    return true;
  }

  /**
   * @param Integer[] $nums
   * @return Boolean
   */
  function isMonotonic($nums) {
    return $this->isMonotonicIncreasing($nums) || $this->isMonotonicDecreasing($nums);

  }
}

$sol = new Solution();
echo $sol->isMonotonic([1,2,2,3]) ? 'true' : 'false'; // t
echo "\n";
echo $sol->isMonotonic([6,5,4,4]) ? 'true' : 'false'; // t 
echo "\n";
echo $sol->isMonotonic([1,3,2,]) ? 'true' : 'false'; // f
echo "\n";
