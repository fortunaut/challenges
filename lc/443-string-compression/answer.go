package main

import "fmt"

/**
 * @param {character[]} chars
 * @return {number}
 */
func compress(chars []byte) int {
	prev := chars[0]
	count := 0
	slice := []byte{}
	for i := 0; i < len(chars); i++ {
		if prev == chars[i] {
			count = count + 1
		}
		if prev != chars[i] || (i == len(chars)-1) {
			numbersToAppend := []int{}
			countCopy := count
			for countCopy > 0 {
				numbersToAppend = append([]int{countCopy % 10}, numbersToAppend...)
				countCopy = countCopy / 10
			}
			slice = append(slice, prev)
			if count > 1 {
				for _, num := range numbersToAppend {
					slice = append(slice, byte(num)+'0')
				}
			}
			if prev != chars[i] && i == len(chars)-1 {
				// If we are the last element and are not the previous element, append current element
				slice = append(slice, chars[i])
			}
			count = 1
		}
		prev = chars[i]
	}

	for i, elm := range slice {
		chars[i] = elm
	}

	return len(slice)
}

func main() {
	s := []byte{'a', 'a', 'b', 'b', 'c', 'c', 'c'}
	copiedInput := make([]byte, len(s))
	copy(copiedInput, s)
	result := compress(s)

	fmt.Printf(
		"input: %s\nresult compressed: %s\nwith length %d\n\n",
		copiedInput,
		s,
		result,
	)

	s = []byte{'a'}
	copiedInput = make([]byte, len(s))
	copy(copiedInput, s)
	result = compress(s)

	fmt.Printf(
		"input: %s\nresult compressed: %s\nwith length %d\n\n",
		copiedInput,
		s,
		result,
	)

	s = []byte{'a', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b'}
	copiedInput = make([]byte, len(s))
	copy(copiedInput, s)
	result = compress(s)

	fmt.Printf(
		"input: %s\nresult compressed: %s\nwith length %d\n\n",
		copiedInput,
		s,
		result,
	)

	s = []byte{'a', 'b', 'c'}
	copiedInput = make([]byte, len(s))
	copy(copiedInput, s)
	result = compress(s)

	fmt.Printf(
		"input: %s\nresult compressed: %s\nwith length %d\n\n",
		copiedInput,
		s,
		result,
	)
}
