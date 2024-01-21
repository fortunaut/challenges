
const MOD = 1000000007;


/**
 * @param {number[]} arr
 * @return {number}
 */
const sumSubarrayMins = (arr) => {
  let sum = 0;
  const stack = [];
  const memoized = {}; // memoized[i] = sum of subarrays ending at i

  for (let i = 0; i < arr.length; i++) {
    const curr = arr[i];
    // monotonic increasing stack storing the index
    while (stack.length > 0 && curr <= arr[stack[stack.length - 1]]) {
      stack.pop();
    }
    if (stack.length > 0) {
      const top = stack[stack.length - 1];
      memoized[i] = memoized[top] + curr * (i - top);
    } else {
      memoized[i] = curr * (i + 1);
    }
    stack.push(i);

    sum = (sum + memoized[i]) % MOD;
  }

  return sum;
};

test('case1', () => {
  const val = sumSubarrayMins([3, 1, 2, 4]);
  expect(val).toBe(17);
});
test('case2', () => {
  const val = sumSubarrayMins([11, 81, 94, 43, 3]);
  expect(val).toBe(444);
})
test('case3', () => {
  const val = sumSubarrayMins([3, 1]);
  expect(val).toBe(5);
});
test('case4', () => {
  const val = sumSubarrayMins([3]);
  expect(val).toBe(3);
});
