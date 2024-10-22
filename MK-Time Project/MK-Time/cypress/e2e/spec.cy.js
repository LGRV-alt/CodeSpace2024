describe("Test User Login Functions", () => {
  beforeEach(() => {
    cy.visit("http://localhost/MK-Time/products.php");
    cy.get("#inputEmail").click().type("Lewis@mail.com");
    cy.get("#inputPassword").click().type("Lewis");
    cy.get(".btn").click();
    cy.get("h2").should("contain", "Welcome to MK Time");
  });

  it("test adding product to the cart", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Executive");
    cy.get('.card-body > form > [type="submit"]').click();
    cy.get("h2").should("contain", "Your Cart");
    cy.get(".ml-2 > .font-weight-bold").should("contain", "The Executive");
  });

  it("test removing item", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Executive");
    cy.get('.card-body > form > [type="submit"]').click();
    cy.get("h2").should("contain", "Your Cart");
    cy.get(".align-items-center > .cart-delete-button").click();
    cy.get(".text-center").should("contain", "Your cart is empty.");
  });

  it("Test User logout", () => {
    cy.get(".navbar-brand").should("contain", "MK Time");
    cy.get(":nth-child(4) > .nav-link").click();
    cy.get(".h3").should("contain", "Please sign in");
  });

  it("Test adding multiple items in cart", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Executive");
    cy.get('.card-body > form > [type="submit"]').click();
    cy.get(":nth-child(1) > .nav-link").click();
    cy.get(
      ":nth-child(3) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-title").should("contain", "The Heritage");
    cy.get('.card-body > form > [type="submit"]').click();
    cy.get(".cart-number").should("contain", 2);
  });
  it("Test the serach function", () => {
    cy.get(".navbar-brand").should("contain", "MK Time");
    cy.get(".form-control").type("brown");
    cy.get(".form-inline > .btn").click();
    cy.get(":nth-child(1) > .card > .card-body > .card-title").should(
      "contain",
      "The Voyager"
    );
    cy.get(".form-control").type("fluffy dog");
    cy.get(".form-inline > .btn").click();
    cy.get(
      '[style="display: flex; justify-content: space-evenly; flex-wrap: wrap;"]'
    ).should("contain", "0 records");
  });
});

describe("Test admin functions", () => {
  beforeEach(() => {
    cy.visit("http://localhost/MK-Time/products.php");
    cy.get("#inputEmail").click().type("Admin@mail.com");
    cy.get("#inputPassword").click().type("Admin");
    cy.get(".btn").click();
    cy.get(".navbar-brand > span").should("contain", "Admin");
  });
  it("check product update", () => {
    cy.get(
      ":nth-child(1) > .card > .list-group > .list-group-item.btn > .btn"
    ).click();
    cy.get(".card-body > :nth-child(4)").click();
    cy.get("h2").should("contain", "Update the product");
  });
  it("check the create function", () => {
    cy.get(":nth-child(2) > .nav-link").click();
    cy.get("h1").should("contain", "Add");
  });
});
