<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>CRUD Practice!</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
</head>
<?php
session_start();
// header("Location: products.php")
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
} else {
  header("Location: products.php");
}

?>

<body class="text-center mx-auto" style="width: 30rem; padding-top: 5rem; background-color: #b7e0ff">
  <div class="container" style="padding: 3rem; border-radius: 20px; background-color: white">
    <h1>MK Time</h1>
    <form class="form-signin" action="authenticate.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address" required=""
        autofocus="" />
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
        required="" />
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        Sign in
      </button>
      <a href="createUser.php">Create Account</a>
      <p class="mt-5 mb-3 text-muted">© GRV 2024</p>
    </form>
  </div>
</body>

</html>