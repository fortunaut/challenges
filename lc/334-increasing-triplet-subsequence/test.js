/**
 * @param {number[]} nums
 * @return {boolean}
 */
const increasingTriplet = (nums) => {
  let a = Number.MAX_SAFE_INTEGER;
  let b = Number.MAX_SAFE_INTEGER;
  for (let i = 0; i < nums.length; i++) {
    num = nums[i];
    if (num <= a) {
      a = num;
    } else if (num <= b) {
      b = num;
    }
    if (num > b && b > a) {
      return true;
    }

  }
  return false;
};

test('case1', () => {
  const val = increasingTriplet([1, 2, 3, 4, 5]);
  expect(val).toBe(true);
});

test('case2', () => {
  const val = increasingTriplet([5, 4, 3, 2, 1]);
  expect(val).toBe(false);
});

test('case3', () => {
  const val = increasingTriplet([2, 1, 5, 0, 4, 6]);
  expect(val).toBe(true);
});

test('case4', () => {
  const val = increasingTriplet([20, 100, 10, 12, 5, 13]);
  expect(val).toBe(true);
});