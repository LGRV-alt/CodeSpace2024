console.log("Hello World");

function greet(name) {
  console.log(`Hello my name is ${name}`);
}

let string = "Lewis";

function reverseStr(name) {
  reversed = name.split("").reverse().join("");
  console.log(reversed);
}

reverseStr = (str) => str.split("").reverse().join("");

console.log(reverseStr("spencer"));
