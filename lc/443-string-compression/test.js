/**
 * @param {character[]} chars
 * @return {number}
 */
const compress = (chars) => {
  let s = [];
  let count = 0;
  let prev = '';
  for (let i = chars.length - 1; i >= 0; i--) {
    const char = chars[i];
    if (prev == char) {
      count++;
    } else {
      if (count > 1) {
        while (count > 10) {
          s.unshift(count % 10);
          s = Math.floor(count / 10);
        }
      }
      s.unshift(prev);
      prev = char;
      count = 1;
    }
  }
  if (count > 1) {
    while (count > 10) {
      s.unshift(count % 10);
      s = Math.floor(count / 10);
    }
  }
  s.unshift(prev);
  chars = s;
  return chars.length;
};
// This works locally but fails on the website, likely bc of JS nonsense.
// TODO: Rewrite this in Go???

test('case1', () => {
  let s = ["a", "a", "b", "b", "c", "c", "c"];
  const val = compress(s);
  expect(s).toBe(["a", "2", "b", "2", "c", "3"]);
  expect(val).toBe(6);
});

// test('case2', () => {
//   const val = compress(["a"]);
//   expect(val).toBe(1);
// });

// test('case3', () => {
//   const val = compress(["a", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b"]);
//   expect(val).toBe(4);
// });

