<?php
/**
 * @author fortunaut <me@fortunaut.dev>
 */

class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target) {
        $neededNumToFoundIndices = [];
        for($i = 0; $i < count($nums); $i++) {
            $currVal = $nums[$i];
            if(isset($neededNumsToFoundIndices[$currVal])
            && $neededNumsToFoundIndices[$currVal] !== $i 
            ) {
                return [$neededNumsToFoundIndices[$currVal], $i];
            }
            $neededNumsToFoundIndices[$target - $currVal] = $i; 
        }
        return [-1,-1];        
    }

    public function slowTwoSum($nums, $target) {
        for($i = 0; $i < count($nums); $i++) {
            for($j = $i + 1; $j < count($nums); $j++) {
                if($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [0,0];        
    }

    public function printAnswer($nums, $target) {
        $pair = $this->twoSum($nums, $target);
        printf("[%d, %d]\n", $pair[0], $pair[1]);
    } 
}

$class = new Solution();
$class->printAnswer([2,7,11,15], 9);
$class->printAnswer([3,2,4], 6);
$class->printAnswer([3,3], 6);
?>