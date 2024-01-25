/**
 * @param {string[]} arr
 * @return {number}
 */
const maxLength = (arr) => {
  return maxLengthHelper(arr, '', 0, 0);
};

/**
 * @param {string[]} arr
 * @param {string} carry
 * @return {number}
 */
const maxLengthHelper = (arr, currentString, startIndex, maxLength) => {
  let max = Math.max(currentString.length, maxLength);

  for (let i = startIndex; i < arr.length; i++) {
    const nextString = currentString + arr[i];
    if (!isUniqueString(nextString)) {
      continue;
    }
    max = maxLengthHelper(arr, nextString, i + 1, max);
  }
  return max;
}

const isUniqueString = (str) => {
  const map = {};
  for (let i = 0; i < str.length; i++) {
    if (map[str[i]]) {
      return false;
    }
    map[str[i]] = true;
  }
  return true;
}

test('case1', () => {
  const val = maxLength(["un", "iq", "ue"]);
  expect(val).toBe(4);
});

test('case2', () => {
  const val = maxLength(["cha", "r", "act", "ers"]);
  expect(val).toBe(6);
});

test('case3', () => {
  const val = maxLength(["abcdefghijklmnopqrstuvwxyz"]);
  expect(val).toBe(26);
});

test('case4', () => {
  const val = maxLength(["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p"]);
  expect(val).toBe(16);
});