<?php # CONNECT TO MySQL DATABASE.


# Connect/Link  on 'localhost' - :3307 is needed due to the normal port (3306) being in use
$link = mysqli_connect('localhost:3307', 'root', 'Password1', 'mktime');
if (!$link) {
    # Otherwise fail gracefully and explain the error. 
    die('Could not connect to MySQL: ' . mysqli_error());
}
// echo 'Connected to the database successfully!';
