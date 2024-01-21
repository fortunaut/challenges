/**
 * @param {number} n
 * @return {number}
 */
const climbStairs = (n) => {
  const seenVals = {};
  return memoizedClimbStairs(n, seenVals);
};

const memoizedClimbStairs = (n, memoizedValues) => {
  if (!!memoizedValues[n]) {
    return memoizedValues[n];
  }
  if (n < 3) {
    // Base cases, if 0 steps to climb, 0 ways
    // If 1 step to climb, 1 way
    // If 2 steps to climb, 2 ways
    memoizedValues[n] = n;
    return n;
  }
  memoizedValues[n - 1] = memoizedClimbStairs(n - 1, memoizedValues);
  memoizedValues[n - 2] = memoizedClimbStairs(n - 2, memoizedValues);
  return memoizedValues[n - 1] + memoizedValues[n - 2];
}

test('case1', () => {
  const val = climbStairs(2);
  expect(val).toBe(2);
});
test('case2', () => {
  const val = climbStairs(3);
  expect(val).toBe(3);
})
test('case3', () => {
  const val = climbStairs(1);
  expect(val).toBe(1);
});