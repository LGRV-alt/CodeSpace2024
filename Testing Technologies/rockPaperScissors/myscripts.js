// Buttons for player options
const rockBtn = document.getElementById("rock");
const paperBtn = document.getElementById("paper");
const scissorsBtn = document.getElementById("scissors");

// Where the player, computer and result data will be placed
const userOption = document.getElementById("user-option");
const computerOptionSpan = document.getElementById("computer-option");
const results = document.getElementById("result");

// Choices that can be picked
const choice = ["Rock", "Paper", "Scissors"];

// Listening for the click of buttons and handling the choice
rockBtn.addEventListener("click", () => {
  playGame(choice[0]);
});

paperBtn.addEventListener("click", () => {
  playGame(choice[1]);
});

scissorsBtn.addEventListener("click", () => {
  playGame(choice[2]);
});

// Play the game function
function playGame(userChoice) {
  // random number for computer choice
  const computerOption = choice[Math.floor(Math.random() * choice.length)];
  computerOptionSpan.innerHTML = computerOption;

  //   set player choice
  userOption.innerHTML = userChoice;

  //   compare the results
  if (userChoice == computerOption) {
    results.innerHTML = "Its a Tie";
  } else if ((userChoice === "Rock") & (computerOption === "Scissors")) {
    results.innerHTML = "You win, Rock smashes scissors";
  } else if ((userChoice === "Scissors") & (computerOption === "Paper")) {
    results.innerHTML = "You win, Scissors covers the rock";
  } else if ((userChoice === "Paper") & (computerOption === "Rock")) {
    results.innerHTML = "You win, Paper covers the rock";
  } else {
    results.innerHTML = "You loose";
  }
}
