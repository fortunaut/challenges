<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[] Even nums up front, odd in the back
     */
    function sortArrayByParity($nums) {
        $answer = [];
        foreach($nums as $num) {
            if ($num % 2 === 0) {
                array_unshift($answer, $num);
            } else {
                $answer[] = $num;
            }
        }
        return $answer;
    }
}

$sol = new Solution();
var_dump($sol->sortArrayByParity([3,2,1,4])); // [2,4,3,1] or something similar