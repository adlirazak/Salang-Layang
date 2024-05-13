<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "salanglayang";

// First, connect to the MySQL server.
$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($link->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $link->error;
}

// Select the database
$link->select_db($database);

// Create the Customer table
$sql = "CREATE TABLE IF NOT EXISTS Customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Fullname VARCHAR(50),
    Email VARCHAR(50),
    Username VARCHAR(50),
    Passwords VARCHAR(50)
)";

if ($link->query($sql) === TRUE) {
    echo "Table 'Customer' created successfully<br>";
} else {
    echo "Error creating table: " . $link->error;
}

// Create the Booking table
$sql = "CREATE TABLE IF NOT EXISTS Booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_name VARCHAR(50),
    price INT,
    seat VARCHAR(10),
    book_time VARCHAR(50)
)";

if ($link->query($sql) === TRUE) {
    echo "Table 'Booking' created successfully<br>";
} else {
    echo "Error creating table: " . $link->error;
}

// Close the connection
$link->close();
?>
