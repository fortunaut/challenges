package main

func rangeBitwiseAnd(left int, right int) int {
	count := 0
	for left != right {
		left = left >> 1
		right = right >> 1
		count = count + 1
	}
	return left << count
}
