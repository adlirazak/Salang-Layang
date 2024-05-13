<?php
// Connect to the database
$link = mysqli_connect("localhost", "root", "", "salanglayang");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Retrieve the movie name from the POST data
$movieName = mysqli_real_escape_string($link, $_POST["movie_name"]);
$bookTime = mysqli_real_escape_string($link, $_POST["book_time"]);
$seat = mysqli_real_escape_string($link, $_POST["seat"]);

// Execute the DELETE query
$sql = "DELETE FROM booking WHERE movie_name = '$movieName' AND book_time = '$bookTime' AND seat = '$seat'";
if (mysqli_query($link, $sql)) {
    // If the deletion is successful, send a success response
    echo "Success";
} else {
    // If an error occurs, send an error response
    echo "Error: " . mysqli_error($link);
}

// Close the connection to the database
mysqli_close($link);
?>
