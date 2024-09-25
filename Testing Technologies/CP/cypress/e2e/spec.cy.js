// First Cypress test - Open page, query element, click element and finally assert for information

describe("Cypress example Test", () => {
  it("Visits the cypress kitchen sink, queries an element and interacts with it", () => {
    // Visit the page -
    cy.visit("https://example.cypress.io");
    // Query for an element
    cy.get(".home-list").contains("Querying");
    // Interact with the element
    cy.get(".home-list").contains("Querying").click();
    //  Assert the content on the page
    cy.url().should("include", "/commands/querying");
    cy.get("h1").should("contain", "Querying");
  });
});

describe("Cypress Email example", () => {
  it("Visit the commands actions site and clicks an element and inputs a value within", () => {
    // Visit the page -
    cy.visit("https://example.cypress.io/commands/actions");
    // Query for an element
    cy.get(".action-email");
    // Type into the element
    cy.get(".action-email").type("lewisgirvan@hotmail.com");
    //  Assert the content on the page
    cy.url().should("include", "/commands/actions");
    cy.get(".action-email").should("have.value", "lewisgirvan@hotmail.com");
  });
});

describe("Cypress Click on buttons example", () => {
  it("Visit commands/actions, click multiple buttons inc different areas of the buttons", () => {
    // Visit the page -
    cy.visit("https://example.cypress.io/commands/actions");
    // Query for an element
    cy.get(".action-btn");
    // Click on the element
    cy.get(".action-btn").click();
    // Query for an element
    cy.get("#action-canvas");
    // Click on the element
    // Middle (Standard)
    cy.get("#action-canvas").click();
    // Top Left
    cy.get("#action-canvas").click("topLeft");
    // Bottom Right
    cy.get("#action-canvas").click("bottomRight");
  });
});
