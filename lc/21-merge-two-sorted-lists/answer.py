# LeetCode problem 21- Merge Two Sorted Lists
# Merge two sorted linked lists and return it as a new list. The new list should be made
# by splicing the nodes of the first two lists. 

import unittest

# Definition for a single-linked list
class ListNode:
    def __init__(self, x):
        self.val = x
        self.next = None

class Solution:
    def mergeTwoLists(self, l1: ListNode, l2: ListNode) -> ListNode:
        curr = ListNode(0)
        head = curr
        while l1 is not None or l2 is not None:
            if l1 is None:
                curr.next = l2
                l2 = None
            elif l2 is None:
                curr.next = l1
                l1 = None
            elif l1.val <= l2.val:
                curr.next = ListNode(l1.val)
                l1 = l1.next
            elif l1.val > l2.val:
                curr.next = ListNode(l2.val)
                l2 = l2.next
            curr = curr.next
        return head.next
class TestSolution(unittest.TestCase):
    def test1(self):
        l1 = ListNode(1)
        l1.next = ListNode(2)
        l1.next.next = ListNode(4)
        l2 = ListNode(1)
        l2.next = ListNode(3)
        l2.next.next = ListNode(4)
        merged = Solution().mergeTwoLists(l1, l2)
        mockAnswer = ListNode(1)
        current = mockAnswer
        for n in [1, 2, 3, 4, 4]:
            current.next = ListNode(n)
            current = current.next
        while merged is not None:
            self.assertEqual(merged.val, mockAnswer.val)
            merged = merged.next
            mockAnswer = mockAnswer.next

if __name__ == '__main__':
    unittest.main()


