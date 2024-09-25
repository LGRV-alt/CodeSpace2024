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
