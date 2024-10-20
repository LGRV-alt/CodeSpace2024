<?php
include "includes/head.php";
include "includes/nav.php";

// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$DATABASE_HOST = 'localhost:3307';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'Password1';
$DATABASE_NAME = 'mktime';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT pass, email, first_name, last_name FROM users WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($pass, $email, $first_name, $last_name);
$stmt->fetch();
$stmt->close();
?>

<body class="loggedin">
    <div class="content">
        <h2>Profile Page</h2>
        <div>
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?= htmlspecialchars($first_name, ENT_QUOTES) ?> <?= htmlspecialchars($last_name, ENT_QUOTES) ?>
                    </td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><?= htmlspecialchars($email, ENT_QUOTES) ?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?= htmlspecialchars($pass, ENT_QUOTES) ?></td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>
<?php
include "includes/footer.php"
    ?>