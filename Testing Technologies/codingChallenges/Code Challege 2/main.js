// Coding Task 1 - Classes and Objects

// class User {
//   constructor(firstName, lastName) {
//     this.firstName = firstName;
//     this.lastName = lastName;
//   }
//   hello() {
//     console.log(`hello, ${this.firstName} ${this.lastName}`);
//   }
// }

// const user1 = new User("John", "Doe");
// user1.hello();

// const user2 = new User("Jane", "Doe");
// user2.hello();

// Coding Task 2 - ENcapsulation

class User {
  constructor(firstName, lastName) {
    this._firstName = firstName;
    this._lastName = lastName;
  }

  get names() {
    return `My name is ${this._firstName} ${this._lastName}`;
  }

  set firstName(firstName) {
    this._firstName = firstName;
  }

  set lastName(lastName) {
    this._lastName = lastName;
  }

  hello() {
    return "Hello World!";
  }
}

const user = new User();
user.firstName = "Lewis";
user.lastName = "Girvan";
console.log(user.hello());
console.log(user.names);
