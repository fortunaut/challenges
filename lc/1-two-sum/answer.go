package main

import "fmt"

/**
 * Given nums and target, return indices of the two numbers such that
 * they add up to target
 */
func TwoSum(nums []int, target int) []int {
  neededAddends := make(map[int]int)
  for i, num := range nums {
    previouslyFoundIndex, isNeededNumber := neededAddends[num]
    if isNeededNumber {
      return []int{previouslyFoundIndex, i}
    }
    neededAddends[target - num] = i
  }
  return []int{0,0}
}

func main() {
  nums1 := []int{2,7,11,15}
  target1 := 9
  result := TwoSum(nums1, target1)
  fmt.Printf(
    "The result is [%d, %d]\n",
    result[0],
    result[1],
  )
}