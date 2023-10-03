<?php 

class Solution {

  function factorial($num) {
    if ($num <= 1) {
      return 1 ;
    }
    return $num * $this->factorial($num-1);
  }

  /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
      $foundNums = [];
      $count = 0;
      foreach ($nums as $num) {
        $foundNums[$num] = $foundNums[$num] ?? 0;
        $foundNums[$num]++;
      }
      // from $found choose 2 is equal to $found! / (2*($found -2)!)
      foreach ($foundNums as $found) {
        if ($found > 1) {
          $count += $this->factorial($found) / (2 * ($this->factorial($found - 2)));
        }
      }
      return $count;
  }
}

$sol = new Solution();

printf("%d\n", $sol->numIdenticalPairs([1,2,3,1,1,3])); // 4
printf("%d\n", $sol->numIdenticalPairs([1,1,1,1])); // 6
printf("%d\n", $sol->numIdenticalPairs([1,2,3])); // 0