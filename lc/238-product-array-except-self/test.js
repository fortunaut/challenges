/**
 * @param {number[]} nums
 * @return {number[]}
 */
const productExceptSelf = (nums) => {
  const prefixProducts = nums.reduce(productsReducer, []);
  const suffixProducts = nums.reverse().reduce(productsReducer, []).reverse();;
  const answer = [];
  for (let i = 0; i < nums.length; i++) {
    const leftFactor = (i - 1 >= 0) ? prefixProducts[i - 1] : 1;
    const rightFactor = (i + 1 < nums.length) ? suffixProducts[i + 1] : 1;
    let product = Number(leftFactor * rightFactor);
    if (product === -0) {
      product = 0;
    }
    answer.push(product);
  }
  return answer;
};

const productsReducer = (accumulator, number) => {
  const prevProduct = accumulator.length > 0 ? accumulator[accumulator.length - 1] : 1;
  accumulator.push(prevProduct * number);
  return accumulator;
};

test('case1', () => {
  const val = productExceptSelf([1, 2, 3, 4]);
  expect(val).toEqual([24, 12, 8, 6]);
});

test('case2', () => {
  const val = productExceptSelf([-1, 1, 0, -3, 3]);
  expect(val).toEqual([0, 0, 9, 0, 0]);
});
