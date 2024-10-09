// Testing the Rock Paper Scissors Page

// Check all the elements are present on the page
describe("Home Page", () => {
  it("Check all the elements are on the page", () => {
    cy.visit("http://127.0.0.1:5500/");
    cy.get("h1").contains("Rock Paper Scissors");
    cy.get("h2").contains("Player Choice");
    cy.get("h2").contains("Computer Option");
    cy.get("h2").contains("Result");
  });
});

// Test the rock button and the output matches
describe("Rock Button", () => {
  it("Click the rock button and expect the output to be rock", () => {
    cy.visit("http://127.0.0.1:5500/");
    cy.get("button").contains("Rock").click();
    cy.get("#user-option").contains("Rock");
  });
});

// Test the Paper button and the output matches
describe("Paper Button", () => {
  it("Click the paper button and expect the output to be paper", () => {
    cy.visit("http://127.0.0.1:5500/");
    cy.get("button").contains("Paper").click();
    cy.get("#user-option").contains("Paper");
  });
});

// Test the Scissors button and the output matches
describe("Scissors Button", () => {
  it("Click the scissors button and expect the output to be scissors", () => {
    cy.visit("http://127.0.0.1:5500/");
    cy.get("button").contains("Scissors").click();
    cy.get("#user-option").contains("Scissors");
  });
});
