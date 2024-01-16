
class RandomizedSet {
  constructor() {
    this.map = {};
  }

  insert(val) {
    if (this.map[val]) {
      return false;
    }
    this.map[val] = true;
    return true;
  }

  remove(val) {
    if (this.map[val]) {
      delete this.map[val];
      return true;
    }
    return false;
  }

  getRandom() {
    const items = Object.keys(this.map);
    const randomIndex = Math.floor(Math.random() * items.length);
    return items[randomIndex];

  }

};

const outputs = [];
outputs.push(test = new RandomizedSet());
outputs.push(test.insert(1));
outputs.push(test.remove(2));
outputs.push(test.insert(2));
outputs.push(test.getRandom());
outputs.push(test.remove(1));
outputs.push(test.insert(2));
outputs.push(test.getRandom());
console.log(outputs);