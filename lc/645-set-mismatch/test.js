/**
 * @param {number[]} nums
 * @return {number[]}
 */
const findErrorNums = (nums) => {
  nums.sort((a, b) => (a - b));
  let duplicateVal = 0, missing = 0, prev = 0;
  console.log(nums);
  for (let i = 0; i < nums.length; i++) {
    const currVal = nums[i];
    if (currVal === prev && prev !== 0) {
      duplicateVal = currVal;
      nums.splice(i, 1);
      break;
    }
    prev = currVal;
  }
  for (let i = 0; i <= nums.length; i++) {
    const expectedVal = i + 1;
    if (expectedVal !== nums[i]) {
      missing = expectedVal;
      break;
    }
  }

  return [duplicateVal, missing];
};

test('case1', () => {
  const val = findErrorNums([1, 2, 2, 4]);
  expect(val[0]).toBe(2);
  expect(val[1]).toBe(3);
});

test('case2', () => {
  const val = findErrorNums([1, 1]);
  expect(val[0]).toBe(1);
  expect(val[1]).toBe(2);
});

test('case3', () => {
  const val = findErrorNums([1, 2, 3, 2]);
  expect(val[0]).toBe(2);
  expect(val[1]).toBe(4);
});

test('case4', () => {
  const val = findErrorNums([1, 5, 3, 2, 2, 7, 6, 4, 8, 9]);
  expect(val[0]).toBe(2);
  expect(val[1]).toBe(10);
});

test('case5', () => {
  const val = findErrorNums([3, 2, 3, 4, 6, 5]);
  expect(val[0]).toBe(3);
  expect(val[1]).toBe(1);
});

test('case6', () => {
  const val = findErrorNums([37, 62, 43, 27, 12, 66, 36, 18, 39, 54, 61, 65, 47, 32, 23, 2, 46, 8, 4, 24, 29, 38, 63, 39, 25, 11, 45, 28, 44, 52, 15, 30, 21, 7, 57, 49, 1, 59, 58, 14, 9, 40, 3, 42, 56, 31, 20, 41, 22, 50, 13, 33, 6, 10, 16, 64, 53, 51, 19, 17, 48, 26, 34, 60, 35, 5]);
  expect(val[0]).toBe(39);
  expect(val[1]).toBe(55);
});

