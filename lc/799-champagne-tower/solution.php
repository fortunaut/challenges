<?php
class Solution {

  /**
   * @param Integer $poured
   * @param Integer $query_row
   * @param Integer $query_glass
   * @return Float
   */
  function champagneTower($poured, $query_row, $query_glass) {
      $champagneFlowPerCup[0][0] = $poured;
      for ($row = 0; $row <= $query_row; $row++) {
        for ($col = 0; $col <= $row; $col++) {
          $champagneFlowedOnEachSideOfThisCup = 
          (($champagneFlowPerCup[$row][$col] ?? 0) - 1) / 2;
          // Add the overflow from this cup to the two cups below
          if ($champagneFlowedOnEachSideOfThisCup > 0) {
          $champagneFlowPerCup[$row+1][$col] = 
            ($champagneFlowPerCup[$row+1][$col] ?? 0)
            + $champagneFlowedOnEachSideOfThisCup;
          $champagneFlowPerCup[$row+1][$col+1] = 
            ($champagneFlowPerCup[$row+1][$col+1] ?? 0)
             + $champagneFlowedOnEachSideOfThisCup;
          }
        }
      }
      return min(1, $champagneFlowPerCup[$query_row][$query_glass] ?? 0);
  }
}

$soln = new Solution();

echo $soln->champagneTower(1, 1, 1); // 0
echo "\n";
echo $soln->champagneTower(2, 1, 1); // 0.5
echo "\n";
echo $soln->champagneTower(100000009, 33, 17); // 1
echo "\n";
