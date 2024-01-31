package main

import (
	"fmt"
	"strconv"
)

func evalRPN(tokens []string) int {
	stack := []int{}

	for _, token := range tokens {
		num, err := strconv.Atoi(token)
		if err == nil {
			// If the token is an integer
			// Push num onto the stack
			stack = append(stack, num)
		} else {
			// Else, the token is an operation
			first := stack[len(stack)-2]
			second := stack[len(stack)-1]
			// Remove last two items from stack
			stack = stack[:len(stack)-2]
			switch token {
			case "+":
				stack = append(stack, first+second)
			case "-":
				stack = append(stack, first-second)
			case "*":
				stack = append(stack, first*second)
			case "/":
				stack = append(stack, first/second)
			default:
				fmt.Println("Error with operator" + token)
				return 0
			}
		}
	}
	return stack[len(stack)-1]
}

func main() {
	fmt.Println(evalRPN([]string{"2", "1", "+", "3", "*"}))
	// expects 9
	fmt.Println(evalRPN([]string{"4", "13", "5", "/", "+"}))
	// expects 6
	fmt.Println(evalRPN([]string{"10", "6", "9", "3", "+", "-11", "*", "/", "*", "17", "+", "5", "+"}))
	// expects 22
}
