<?php
// First, connect to the MySQL server.
$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Then, select the database.
mysqli_select_db($link, "salanglayang") or die(mysqli_error($link));

// Retrieve the form data
$movie_name = mysqli_real_escape_string($link, $_POST["movie_name"]);
$price = mysqli_real_escape_string($link, $_POST["price"]);
$seat = mysqli_real_escape_string($link, $_POST["seat"]);
$book_time = mysqli_real_escape_string($link, $_POST["book_time"]);

// Use the INSERT INTO statement to insert the data into the table
$sql = "INSERT INTO booking (movie_name, price, seat, book_time) 
        VALUES ('$movie_name', '$price', '$seat', '$book_time')";

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
