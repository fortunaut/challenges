package main

import (
	"container/heap"
	"fmt"
)

// Use to represent something like "5 appears 3 times"
type IntCount struct {
	Value int
	Count int
}

type CountHeap []IntCount

func (h CountHeap) Len() int {
	return len(h)
}

func (h CountHeap) Less(i int, j int) bool {
	return h[i].Count < h[j].Count
}

func (h CountHeap) Swap(i int, j int) {
	temp := h[i]
	h[i] = h[j]
	h[j] = temp
}

func (h *CountHeap) Push(x any) {
	*h = append(*h, x.(IntCount))
}

func (h *CountHeap) Pop() any {
	oldHeap := *h
	oldLen := len(*h)
	top := oldHeap[oldLen-1]
	*h = oldHeap[0 : oldLen-1]
	return top
}

// Great, this seems to work.
func TestHeap() {
	h := &CountHeap{}
	heap.Init(h)
	heap.Push(h, IntCount{Value: 3, Count: 10})
	heap.Push(h, IntCount{Value: 12, Count: 2})
	heap.Push(h, IntCount{Value: 9, Count: 5})
	fmt.Printf("minimum: %d\n", (*h)[0])
	for h.Len() > 0 {
		fmt.Printf("%d ", heap.Pop(h))
	}
}

// This is the actual question
func findLeastNumOfUniqueInts(arr []int, k int) int {
	// Let's go through arr adding ints to a map of int value => int count
	counts := map[int]int{}
	for i := 0; i < len(arr); i++ {
		val := arr[i]
		oldCount, ok := counts[val]
		if ok {
			counts[val] = oldCount + 1
		} else {
			counts[val] = 1
		}
	}

	// Then dump them all in a heap
	myHeap := &CountHeap{}
	heap.Init(myHeap)
	for value, count := range counts {
		heap.Push(myHeap, IntCount{Value: value, Count: count})
	}

	// Then remove the heap subtracting the k from the top until k is exhausted,
	// while removing from the heap if the count reaches 0
	for k > 0 {
		top := (heap.Pop(myHeap)).(IntCount)
		k = k - top.Count
		if k < 0 {
			// If k was smaller than top.Count, put top back on the heap
			heap.Push(myHeap, top)
		}
	}

	// Return the size of the heap
	return myHeap.Len()
}

func main() {
	fmt.Printf("Result: %v\n", findLeastNumOfUniqueInts([]int{5, 5, 2}, 1))             // 1
	fmt.Printf("Result: %v\n", findLeastNumOfUniqueInts([]int{4, 3, 1, 1, 3, 3, 2}, 1)) // 3
}
