<?php
// First, connect to the MySQL server.
$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Then, select the database.
mysqli_select_db($link, "salanglayang") or die(mysqli_error($link));

// Retrieve the form data
$Fullname = mysqli_real_escape_string($link, $_POST["Fullname"]);
$Username = mysqli_real_escape_string($link, $_POST["Username"]);
$Email = mysqli_real_escape_string($link, $_POST["Email"]);

$Passwords = mysqli_real_escape_string($link, $_POST["Passwords"]);

// Use the INSERT INTO statement to insert the data into the table
$sql = "INSERT INTO customer (Fullname, Email, Username, Passwords) 
        VALUES ('$Fullname', '$Email', '$Username', '$Passwords')";

// Perform the query
if (mysqli_query($link, $sql)) {

    // Prompt the user with a success message
    echo '<script>alert("Your payment has been completed");</script>';

    // Data inserted successfully, redirect to mainPage.html
    header("Location: mainPage.html");
    exit(); // Make sure to exit after the redirect
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

// Close the connection to the MySQL server
mysqli_close($link);
?>
//
<?php
// First, connect to the MySQL server.
$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Then, select the database.
mysqli_select_db($link, "salanglayang") or die(mysqli_error($link));

// Retrieve the form data
$Fullname = mysqli_real_escape_string($link, $_POST["Fullname"]);
$Email = mysqli_real_escape_string($link, $_POST["Email"]);
$Username = mysqli_real_escape_string($link, $_POST["Username"]);
$Passwords = mysqli_real_escape_string($link, $_POST["Passwords"]);

// Use the INSERT INTO statement to insert the data into the table
$sql = "INSERT INTO booking (FUllname, Email, Username, Passwords) 
        VALUES ('$Fullname', '$Email', '$Username', '$Passwords')";

// Perform the query
if (mysqli_query($link, $sql)) {



    // Data inserted successfully, redirect to mainPage.html
    echo '<script>alert("Your payment has been completed"); window.location.href = "mainPage.html";</script>';
    exit(); // Make sure to exit aftertheredirect
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

// Close the connection to the MySQL server
mysqli_close($link);
?>
