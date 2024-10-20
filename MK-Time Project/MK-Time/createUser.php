<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>MK - Time</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
</head>

<body class="text-center mx-auto" style="width: 30rem; padding-top: 5rem; background-color: #A5B68D;">
  <div class="container" style="padding: 3rem; border-radius: 20px; background-color: #FCFAEE">
    <h1>MK Time</h1>
    <?php
    include "includes/head.php";
    if (isset($_SESSION['errorMessage'])) {
      echo "<span style='color:red;'>$_SESSION[errorMessage]</span>";
    }
    if (isset($_SESSION['loggedin'])) {
      header('Location: index.php');
      exit;
    }
    ?>
    <form class="form-signin" action="register.php" method="post" autocomplete="off">

      <h1 class="h3 mb-3 font-weight-normal">Create Account</h1>
      <label for="first_name" class="sr-only">First Name</label>
      <input type="text" id="inputFirstName" name="first_name" class="form-control mb-3" placeholder="First Name"
        required="" autofocus="" />
      <label for="first_name" class="sr-only">Last Name</label>
      <input type="text" id="inputLastName" name="last_name" class="form-control mb-3" placeholder="Last Name"
        required="" autofocus="" />
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address" required=""
        autofocus="" />
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password"
        required="" />
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        Create Account
      </button>
      <a href="login.php" id="login-button">Login</a>
      <p class="mt-5 mb-3 text-muted">© GRV 2024</p>
    </form>
  </div>
</body>

</html>