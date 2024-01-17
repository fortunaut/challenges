
/**
 * @param {number[]} arr
 * @return {boolean}
 */
const uniqueOccurrences = (arr) => {
  const integerCounts = {};
  arr.forEach(integer => {
    if (!integerCounts[integer]) {
      integerCounts[integer] = 1;
    } else {
      integerCounts[integer]++;
    }
  });
  const map = {};
  const integerCountsAsArry = Object.values(integerCounts);
  for (let i = 0; i < integerCountsAsArry.length; i++) {
    const count = integerCountsAsArry[i];
    if (map[count]) {
      return false;
    }
    map[count] = true;
  }
  return true;
};

test('case1', () => {
  expect(uniqueOccurrences([1, 2, 2, 1, 1, 3])).toBe(true);
});

test('case2', () => {
  expect(uniqueOccurrences([1, 2])).toBe(false);
});

test('case2', () => {
  expect(uniqueOccurrences([-3, 0, 1, -3, 1, 1, 1, -3, 10, 0])).toBe(true);
});