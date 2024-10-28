describe("Test User Login Functions", () => {
  beforeEach(() => {
    cy.visit("http://localhost/MK-time");
    cy.get('[data-cy="email-input"]').as("emailInput");
    cy.get('[data-cy="password-input"]').as("passwordInput");
    cy.get("@emailInput").click().type("Lewis@mail.com");
    cy.get("@passwordInput").click().type("Lewis");
    cy.get(".btn").should("contain", "Sign in").click();
    cy.get("h2").should("contain", "Welcome to MK Time");
  });

  it("test adding product to the cart", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Executive");
    cy.get('input[name="add_to_cart"]').click();
    cy.get("h2").should("contain", "Your Cart");
    cy.get("span").should("contain", "The Executive");
  });

  it("test removing item", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Executive");
    cy.get('input[name="add_to_cart"]').click();
    cy.get("h2").should("contain", "Your Cart");
    cy.get("a").contains("Delete").click();
    cy.get("p").should("contain", "Your cart is empty.");
  });

  it("Test User logout", () => {
    cy.get(".navbar-brand").should("contain", "MK Time");
    cy.get("a").contains("Logout").click();
    cy.get(".h3").should("contain", "Please sign in");
  });

  it("Test adding multiple items in cart", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Executive");
    cy.get('input[name="add_to_cart"]').click();
    cy.get("a").contains("Products").click();
    cy.get(
      ":nth-child(3) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Heritage");
    cy.get('input[name="add_to_cart"]').click();
    cy.get(".cart-number").should("contain", 2);
  });

  it("Test the serach function", () => {
    cy.get(".navbar-brand").should("contain", "MK Time");
    cy.get(".form-control").type("brown");
    cy.get("button").contains("Search").click();
    cy.get(":nth-child(1) > .card > .card-body > .card-title").should(
      "contain",
      "The Voyager"
    );
    cy.get(".form-control").type("fluffy dog");
    cy.get("button").contains("Search").click();
    cy.get("div").should("contain", "0 records");
  });
});

describe("Test admin functions", () => {
  beforeEach(() => {
    cy.visit("http://localhost/MK-time");
    cy.get('[data-cy="email-input"]').as("emailInput");
    cy.get('[data-cy="password-input"]').as("passwordInput");
    cy.get("@emailInput").click().type("Admin@mail.com");
    cy.get("@passwordInput").click().type("Admin");
    cy.get("button").contains("Sign in").click();
    cy.get("span").should("contain", "Admin");
  });

  it("check product update", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get("div").contains("Update").click();
    cy.get("h2").should("contain", "Update the product");
  });

  it("check the create function", () => {
    cy.get("a").contains("Create").click();
    cy.get("h1").should("contain", "Add");
  });
});
