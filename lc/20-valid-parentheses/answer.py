# LeetCode problem 20 - Valid Parentheses
# Given a string containing just the character '(', ')', '{', '}', '[', ']', determine if the input string is valid. 
# An input string is valid if:
# 1. Open brackets must be closed by the same type of brackets.
# 2. Open brackets must be closed in the correct order.
import unittest 

class Solution:
    def isValid(self, s: str) -> bool:
        buffer = []
        lookup = {')':'(', ']':'[', '}':'{'}
        for char in s:
            if len(buffer) < 1 and char in lookup:
                return False
            if not char in lookup: 
                buffer.append(char)
            else:
                popped = buffer.pop()
                if lookup[char] != popped:
                    return False
        return len(buffer) == 0

class Test(unittest.TestCase):
    def test1(self):
        self.assertEqual(Solution().isValid('()'), True)
    def test2(self):
        self.assertEqual(Solution().isValid('()[]{}'), True)
    def test3(self):
        self.assertEqual(Solution().isValid('(]'), False)
    def test4(self):
        self.assertEqual(Solution().isValid('([)]'), False)
    def test5(self):
        self.assertEqual(Solution().isValid('{[]}'), True)
    def test6(self):
        self.assertEqual(Solution().isValid('['), False)
if __name__ == '__main__':
    unittest.main()
    
