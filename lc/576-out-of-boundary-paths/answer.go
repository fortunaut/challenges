package main

import "fmt"

const MOD = int(1e9 + 7)

func findPaths(m int, n int, maxMove int, startRow int, startColumn int) int {
	memo := make([][][]int, m)
	for i := range memo {
		memo[i] = make([][]int, n)
		for j := range memo[i] {
			memo[i][j] = make([]int, maxMove+1)
		}
	}
	for i := 0; i < len(memo); i++ {
		for j := 0; j < len(memo[i]); j++ {
			for k := 0; k < len(memo[i][j]); k++ {
				memo[i][j][k] = -1
			}
		}
	}
	return findPathsMemoized(m, n, maxMove, startRow, startColumn, &memo)
}

func findPathsMemoized(rows int, columns int, maxMove int, startRow int, startColumn int, memo *[][][]int) int {
	isOutOfBounds := startRow < 0 || startColumn < 0 || startRow >= rows || startColumn >= columns
	if isOutOfBounds {
		return 1
	}
	if maxMove < 1 {
		return 0
	}
	if (*memo)[startRow][startColumn][maxMove] >= 0 {
		return (*memo)[startRow][startColumn][maxMove]
	}

	leftSum := findPathsMemoized(rows, columns, maxMove-1, startRow, startColumn-1, memo) % MOD
	upSum := findPathsMemoized(rows, columns, maxMove-1, startRow-1, startColumn, memo) % MOD
	rightSum := findPathsMemoized(rows, columns, maxMove-1, startRow, startColumn+1, memo) % MOD
	downSum := findPathsMemoized(rows, columns, maxMove-1, startRow+1, startColumn, memo) % MOD
	total := (leftSum + upSum + rightSum + downSum) % MOD
	(*memo)[startRow][startColumn][maxMove] = total
	return (*memo)[startRow][startColumn][maxMove]
}

func main() {
	fmt.Printf("result: %d\n\n", findPaths(2, 2, 2, 0, 0))    // 6 expected
	fmt.Printf("result: %d\n\n", findPaths(1, 3, 3, 0, 1))    // 12 expected
	fmt.Printf("result: %d\n\n", findPaths(8, 7, 16, 1, 5))   // 102984580 expected
	fmt.Printf("result: %d\n\n", findPaths(8, 50, 23, 5, 26)) // 914783380 expected
}
