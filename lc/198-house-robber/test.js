/**
 * @param {number[]} nums
 * @return {number}
 */
var rob = (nums) => {
  let sum1 = 0;
  let sum2 = 0;
  let prevSum1 = 0;
  let prevSum2 = 0;
  for (let i = 0; i < nums.length; i++) {
    const curr = nums[i];
    // find the sums so far of robbing and skipping current house
    sum1 = Math.max(prevSum1, prevSum2); // sum skipping current house
    sum2 = prevSum1 + curr;
    prevSum1 = sum1;
    prevSum2 = sum2;
  }
  return Math.max(sum1, sum2);
};

test('case1', () => {
  const val = rob([1, 2, 3, 1]);
  expect(val).toBe(4);
});
test('case2', () => {
  const val = rob([2, 7, 9, 3, 1]);
  expect(val).toBe(12);
});