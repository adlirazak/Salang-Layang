<?php
ob_start();

// First, connect to the MySQL server.
$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Then, select the database.
mysqli_select_db($link, "salanglayang") or die(mysqli_error($link));

if (isset($_POST['signin'])) {
    $Username = mysqli_real_escape_string($link, $_POSTU"Username");
    $Passwords = mysqli_real_escape_string($link, $_POST["Passwords"]);

    $login_query = "SELECT * FROM customer WHERE Username = '$Username' AND Passwords = '$Passwords'";
    $result = mysqli_query($link, $login_query) or die('Error: ' . mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: index.html');
        exit;
    } else {
        header('Location: SIgnin.html?error=1');
        exit;
    }
}

mysqli_close($link);
?>
