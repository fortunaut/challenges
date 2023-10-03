<?php 

class Solution {

  /**
   * @param Integer[] $flowerbed
   * @param Integer $n
   * @return Boolean
   */
  function canPlaceFlowers($flowerbed, $n) {
    $plantableFlowers = 0;
    for($i = 0; $i < count($flowerbed); $i++) {
      $prev = $flowerbed[$i - 1] ?? 0;
      $curr = $flowerbed[$i];
      $next = $flowerbed[$i + 1] ?? 0;
      if (!($prev || $curr || $next)) {
        $flowerbed[$i] = 1;
        $plantableFlowers++;
        if ($plantableFlowers >= $n) {
          return true;
        }
      }
    }
    return $plantableFlowers >= $n;
  }
}

$sol = new Solution();

printf("%b\n", $sol->canPlaceFlowers([1,0,0,0,1], 1)); // 1
printf("%b\n", $sol->canPlaceFlowers([1,0,0,0,1], 2)); // 0
