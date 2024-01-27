package main

import "fmt"

func moveZeroes(nums []int) {
	i := 0
	j := 0
	for i < len(nums) {
		// First, get the index of the next nonzero item and assign to j
		for j < len(nums) && nums[j] == 0 {
			fmt.Println(j)
			j++
		}
		// Second, set nums[i] to that value. If j is out of range, set 0 instead
		if j < len(nums) {
			fmt.Printf("here is nums[i]: %d, nums[j]: %d\n", nums[i], nums[j])
			nums[i] = nums[j]
		} else {
			nums[i] = 0
		}
		// Move i and j to their next element
		j++
		i++
	}
}

func printArray(arr []int) {
	for i, elm := range arr {
		if i > 0 {
			fmt.Print(", ")
		}
		fmt.Printf("%d", elm)
	}
	fmt.Println()
}

func main() {
	nums := []int{0, 1, 0, 3, 12}
	copiedInput := make([]int, len(nums))
	copy(copiedInput, nums)
	moveZeroes(nums)
	fmt.Print("input: ")
	printArray(copiedInput)
	fmt.Print("mutated input: ")
	printArray(nums)
	fmt.Println()
	fmt.Println()
}
