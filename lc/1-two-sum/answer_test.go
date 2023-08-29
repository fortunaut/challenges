package main

import (
  "testing"
  "fmt"
)

type twoSumTest = struct {
  argNums []int;
  argTarget int;
  expectedResult []int;
}

var twoSumTests = []twoSumTest{
  twoSumTest{[]int{2,7,11,15}, 9, []int{0,1}},
  twoSumTest{[]int{3,2,4}, 6, []int{1,2}},
  twoSumTest{[]int{3,3}, 6, []int{0,1}},
  twoSumTest{[]int{1,-2,55,3,9,26}, 7, []int{1,4}},
}

func IntsToString(ints []int) string {
  if len(ints) < 1 {
    return "[]"
  }
  result := "["
  for _, num := range ints {
    result = fmt.Sprintf("%s%d, ", result, num)
  }
  return result[:len(result)-2] + "]"
}

func TestTwoSum(t *testing.T) {
  for i, test := range twoSumTests {
    actualResult := TwoSum(test.argNums, test.argTarget)
    if IntsToString(actualResult) != IntsToString(test.expectedResult) {
      t.Errorf(
        "Expected %s but received %s for test case number %d",
        IntsToString(test.expectedResult),
        IntsToString(actualResult),
        i,
      )
    }
  }
}