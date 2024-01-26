/**
 * @param {string} s
 * @return {string}
 */
const reverseWords = (s) => {
  const words = s.split(' ');
  let answer = '';
  for (let i = 0; i < words.length; i++) {
    if (words[i].length < 1) {
      continue;
    }
    if (answer.length > 0) {
      answer = ' ' + answer;
    }
    answer = words[i] + answer;
  }
  return answer;
};

test('case1', () => {
  const val = reverseWords("the sky");
  expect(val).toBe("sky the");
});

test('case2', () => {
  const val = reverseWords("the sky is blue");
  expect(val).toBe("blue is sky the");
});

test('case3', () => {
  const val = reverseWords("  hello world  ");
  expect(val).toBe("world hello");
});

test('case4', () => {
  const val = reverseWords("a good   example");
  expect(val).toBe("example good a");
});