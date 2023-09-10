<?php

class Solution {

/**
 * @param String $word1
 * @param String $word2
 * @return String
 */
function mergeAlternately($word1, $word2) {
    $maxLen = max(strlen($word1), strlen($word2));
    $answer = '';
    for($i = 0; $i < $maxLen; $i++) {
      $answer .= $word1[$i] ?? '';
      $answer .= $word2[$i] ?? '';
    }
    return $answer;
}

}

$soln = new Solution();
$answer1 = $soln->mergeAlternately('abc','xyz');
$answer2 = $soln->mergeAlternately('abc','tuvwxyz');
$answer3 = $soln->mergeAlternately('abcdef','xyz');
$answer4 = $soln->mergeAlternately('abcdef','');
echo $answer1 . "\n";
echo $answer2 . "\n";
echo $answer3 . "\n";
echo $answer4 . "\n";