package main

import "fmt"

func isSubsequence(s1 string, s2 string) bool {
	i := 0
	j := 0
	for i < len(s1) && j < len(s2) {
		if s1[i] == s2[j] {
			i++
		}
		j++
	}
	return i == len(s1)
}

func main() {
	fmt.Printf("result: %t\n", isSubsequence("abc", "axxxbyyyc")) // true
	fmt.Printf("result: %t\n", isSubsequence("axc", "ahbgdc"))    // false
	fmt.Printf("result: %t\n", isSubsequence("", "ahbgdc"))       // true
	fmt.Printf("result: %t\n", isSubsequence("acb", "ahbgdc"))    // false
}
