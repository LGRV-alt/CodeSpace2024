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

// ----------------Coding Task 2 - Encapsulation -------------------

// class User {
//   constructor(firstName, lastName) {
//     this._firstName = firstName;
//     this._lastName = lastName;
//   }

//   get fullName() {
//     return `My name is ${this._firstName} ${this._lastName}`;
//   }

//   set fullName(newName) {
//     const splitName = newName.split(" ");
//     this._firstName = splitName[0];
//     this._lastName = splitName[1];
//   }

//   hello() {
//     return "Hello World!";
//   }
// }

// const user = new User();
// user.fullName = "Stan Girvan";
// console.log(user.hello());
// console.log(user.fullName);

// -------Coding Task 3 - Inheritance (Subclass and Superclass)--------

class User {
  constructor(username) {
    this._username = username;
  }

  set username(username) {
    this._username = username;
  }
}

class Admin extends User {
  expressYourRole() {
    return "Admin";
  }
  sayHello() {
    return `Hello admin, ${this._username}`;
  }
}

const admin = new Admin();
admin.username = "Balthazar";
console.log(admin.sayHello());

// --------------Coding Task 4 - Polymorphism--------------------

// class User {
//   constructor() {
//     this._numberOfArticles = 0;
//   }

//   set numberOfArcitcles(numberOfArcitcles) {
//     this._numberOfArcitcles = numberOfArcitcles;
//   }

//   get numberOfArcitcles() {
//     return this._numberOfArcitcles;
//   }
//   calcScores() {}
// }

// class Author extends User {
//   constructor() {
//     super();
//   }
//   calcScores() {
//     return this._numberOfArcitcles * 10 + 20;
//   }
// }

// class Editor extends User {
//   constructor() {
//     super();
//   }
//   calcScores() {
//     return this._numberOfArcitcles * 6 + 15;
//   }
// }

// const author = new Author();
// author.numberOfArcitcles = 8;
// console.log(author.calcScores());

// const editor = new Editor();
// editor._numberOfArcitcles = 15;
// console.log(editor.calcScores());

// -----------------Coding Task 5 - Abstraction ----------------

class User {
  constructor() {}

  set username(username) {
    this._username = username;
  }

  get username() {
    return this._username;
  }
  stateYourRole() {
    throw new Error("Method cannot be called from here");
  }
}

class Admin extends User {
  constructor() {
    super();
  }
  stateYourRole() {
    return "admin";
  }
}

class Viewer extends User {
  constructor() {
    super();
  }
  stateYourRole() {
    return "viewer";
  }
}

const admin = new Admin();
admin.username = "Balthazar";
console.log(admin.stateYourRole());

const viewer = new Viewer();
viewer.username = "Melchior";
console.log(viewer.stateYourRole());
