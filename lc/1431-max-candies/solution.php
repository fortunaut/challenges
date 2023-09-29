<?php 

class Solution {

  /**
   * @param Integer[] $candies
   * @param Integer $extraCandies
   * @return Boolean[]
   */
  function kidsWithCandies($candies, $extraCandies) {
    $maxCandiesBeforeExtras = 0;
    foreach ($candies as $candyCount) {
      $maxCandiesBeforeExtras = max($maxCandiesBeforeExtras, $candyCount);
    }
    $answer = [];
    foreach ($candies as $candyCount) {
      $answer[] = ($candyCount + $extraCandies) >= $maxCandiesBeforeExtras;
    }
    return $answer;
  }
}

$sol = new Solution();
var_dump($sol->kidsWithCandies([2,3,5,1,3], 3)); // [t, t, t, f, t]
var_dump($sol->kidsWithCandies([4,2,1,1,2], 1)); // [t, f, ,f ,f ,f]
var_dump($sol->kidsWithCandies([12,1,12], 10)); // [t, f, t]