// Challege 1 - Reverse String
let reverseStr = (str) => str.split("").reverse().join("");

// Challenge 2 - Reverse Array
let reverseArray = (arr) => arr.reverse();

// Challenge 3 - Most expensive
let data = [
  { item: "irn bru", price: 3.25, stock: 50 },
  { item: "fanta", price: 3.98, stock: 45 },
  { item: "diet coke", price: 4.4, stock: 38 },
  { item: "7up", price: 3.99, stock: 42 },
];

function mostExpensiveItem(arr) {
  let totalCost = 0;
  let expensiveProduct = [];
  arr.forEach((product) => {
    let cost = product.price * product.stock;
    if (cost > totalCost) {
      totalCost = cost;
      expensiveProduct = product;
    }
  });
  return expensiveProduct;
}
