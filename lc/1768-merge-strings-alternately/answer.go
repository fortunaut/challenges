package main

import "fmt"

func mergeAlternately(word1 string, word2 string) string {
	answer := []byte{}
	for i := 0; i < max(len(word1), len(word2)); i++ {
		if i < len(word1) {
			answer = append(answer, word1[i])
		}
		if i < len(word2) {
			answer = append(answer, word2[i])
		}
	}

	return string(answer)
}

func main() {
	fmt.Println(mergeAlternately("abc", "pqr")) // apbqcr
	fmt.Println(mergeAlternately("ab", "pqrs")) // apbqrs
}
