package main

import "fmt"

type MyQueue struct {
	s1 []int
	s2 []int
}

func Constructor() MyQueue {
	return MyQueue{}
}

func (this *MyQueue) Push(x int) {
	this.s1 = append(this.s1, x)
}

func (this *MyQueue) FlipStackAOntoStackB(a *[]int, b *[]int) {
	for len(*a) > 0 {
		top := (*a)[len((*a))-1]
		*a = (*a)[:len((*a))-1]
		*b = append((*b), top)
	}
}

func (this *MyQueue) Pop() int {
	this.FlipStackAOntoStackB(&this.s1, &this.s2)
	top := this.s2[len(this.s2)-1]
	this.s2 = this.s2[:len(this.s2)-1]
	this.FlipStackAOntoStackB(&this.s2, &this.s1)
	return top
}

func (this *MyQueue) Peek() int {
	this.FlipStackAOntoStackB(&this.s1, &this.s2)
	top := this.s2[len(this.s2)-1]
	this.FlipStackAOntoStackB(&this.s2, &this.s1)
	return top
}

func (this *MyQueue) Empty() bool {
	return len(this.s1) == 0
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * obj := Constructor();
 * obj.Push(x);
 * param_2 := obj.Pop();
 * param_3 := obj.Peek();
 * param_4 := obj.Empty();
 */
func main() {

	obj := Constructor()
	obj.Push(1)
	obj.Push(2)
	fmt.Printf("pop: %v\n", obj.Pop())
	fmt.Printf("peek: %v\n", obj.Peek())
	fmt.Printf("empty: %v\n", obj.Empty())
}
