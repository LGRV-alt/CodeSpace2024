describe("Home Page", () => {
  it("The h1 Has the Title Rock Paper Scissors", () => {
    cy.visit("http://127.0.0.1:5500/");
    cy.get("h1").contains("Rock Paper Scissors");
    cy.get("button").contains("Rock").click();
  });
});
