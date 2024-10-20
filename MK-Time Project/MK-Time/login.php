<?php
include "includes/head.php";
if (isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}
?>

<body class="container text-center  " style="width: 30rem; padding-top: 5rem; background-color: #A5B68D; color:black;">
    <div class="container" style="padding: 3rem; border-radius: 20px; background-color: #FCFAEE">
        <h1>MK Time</h1>
        <form class="form-signin" action="authenticate.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <?php if (isset($_SESSION['errors'])) {
                echo "<span style='color:red;'>$_SESSION[errors]</span>";
            } ?>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address"
                required="" autofocus="" />
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                required="" />
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">
                Sign in
            </button>
            <a href="createUser.php">Create Account</a>
            <p class="mt-5 mb-3 text-muted">© GRV 2024</p>
        </form>
    </div>
</body>

<?php
include "includes/footer.php"
    ?>