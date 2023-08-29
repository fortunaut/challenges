// LeetCode problem 20 - Valid Parentheses
// Given a string containing just the characters '(', ')', '{', '}', '[',
// ']', determine if the input string is valid. 
// An input string is valid if:
//   1. Open brackets must be closed by the same type of brackets.
//   2. Open brackets must be closed in the correct order.
package main

import (
  "fmt"
  "os"
)
const openers = "({["
const closers = ")}]"

func Contains(haystack []rune, needle rune) bool {
  for _, val := range haystack {
    if val == needle {
      return true
    }
  }
  return false;
}

func IsOpener(input rune) bool {
  return Contains([]rune(openers), input)
}

func GetPairs() map[rune]rune {
  pairs := make(map[rune]rune)
  for i := 0; i < len(openers); i++ {
    pairs[rune(closers[i])] = rune(openers[i])
  }
  return pairs;
}

func IsValid(inputAsString string) bool {
  input := []rune(inputAsString)
  pairs := GetPairs()
  inputLength := len(input)
  buffer := make([]rune, 0, inputLength)
  for _, runeValue := range input {
    openingRune, IsCloser := pairs[runeValue]
    if IsOpener(runeValue) {
      // Found an opening rune, push to buffer
      buffer = append(buffer, runeValue)
    } else if IsCloser {
      // Found a closing rune
      // If buffer is empty, return false
      bufferLen := len(buffer)
      if bufferLen < 1 {
        return false
      }
      // Check if it matches the top of buffer
      topOfBuffer := buffer[len(buffer)-1]
      if topOfBuffer == openingRune {
        // If it does match, pop buffer
        buffer = buffer[:len(buffer)-1];
      } else {
        // If it doesn't match, return false!
        return false
      }
    }
    // Else not a paren, we can ignore
  }
  // If the buffer's empty, we are a valid case
  return len(buffer) == 0;
}

// Run from command lind with something like:
//    go run . "[[()]]" "apple((){})" "[fad[(ew)j]]
func main() {
  argsWithoutProg := os.Args[1:]
  for _, arg := range argsWithoutProg {
    result := ""
    if !IsValid(arg) {
      result = " NOT"
    }
    fmt.Printf(
      "The string %s DOES%s have balanced parentheses\n",
      arg,
      result,
    )
  }
}