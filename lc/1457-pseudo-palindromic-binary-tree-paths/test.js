/**
 * @param {TreeNode} root
 * @return {number}
 */
const pseudoPalindromicPaths = (root) => {
  return countPaths(root);
};

/**
 * Returns an array of paths from root to each leaf
 * @param {TreeNode} root 
 */
const countPaths = (root, currPath = []) => {
  if (!root || !root.val) {
    return 0;
  }
  const newPathSoFar = [root.val].concat(currPath);
  if (!root.left && !root.right) {
    // leaf found
    // If path is pseudo palindromic, increase paths
    if (isPseudoPalindromicPath(newPathSoFar)) {
      return 1;
    }
  }
  const leftCount = countPaths(root.left, newPathSoFar);
  const rightCount = countPaths(root.right, newPathSoFar);
  return leftCount + rightCount;
}

const isPseudoPalindromicPath = (arr) => {
  // Count the elements in the array
  // If there are 0 or 1 odd counts, return true.
  // Else false
  const counts = {};
  arr.forEach(value => {
    if (!counts[value]) {
      counts[value] = 1;
    } else {
      counts[value] = (counts[value] + 1);
    }
  })
  let oddCount = 0;
  Object.values(counts).forEach(value => {
    if (value % 2 === 1) {
      oddCount++
    }
  });

  return oddCount < 2;
}

const TreeNode = (val, left, right) => {
  return {
    val: (val === undefined ? 0 : val),
    left: (left === undefined ? null : left),
    right: (right === undefined ? null : right)
  };
}

const createTree = (arr, index = 0) => {
  // Left is 2i + 1, right is 2i + 2
  if (index > arr.length - 1 || !arr[index]) {
    return null;
  }
  const newNode = TreeNode(
    arr[index],
    createTree(arr, index * 2 + 1),
    createTree(arr, index * 2 + 2)
  )
  return newNode;
};

test('case1', () => {
  const tree = createTree([2, 3, 1, 3, 1, null, 1]);
  const val = pseudoPalindromicPaths(tree);
  expect(val).toBe(2);
});

test('case2', () => {
  const tree = createTree([2, 1, 1, 1, 3, null, null, null, null, null, 1]);
  const val = pseudoPalindromicPaths(tree);
  expect(val).toBe(1);
});

test('case3', () => {
  const tree = createTree([9]);
  const val = pseudoPalindromicPaths(tree);
  expect(val).toBe(1);
});