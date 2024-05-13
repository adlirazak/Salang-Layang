<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <style>
   body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 800px;
      margin: 150px auto 0; /* Updated margin-top value */
      padding: 20px;
      background-color: #F9DFFF;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #6020BA;
      margin-top: 0;
      margin-bottom: 20px;
    }

    p {
      margin: 5px 0;
    }

    form {
      margin-top: 20px;
      width:780px;
    }

    input[type="email"],
    input[type="password"] {
      padding: 8px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button[type="submit"] {
        margin-top:15px;
      background-color: #6020BA;
      color: #fff;
      border: none;
      padding: 10px 16px;
      cursor: pointer;
      border-radius: 4px;
    }

    button[type="submit"]:hover {
      background-color: #48168E;
    }

    .navibar{
    position:fixed;
    background: #6020BA;
    height: 60px;
    width: 100%;
    z-index: 9999;
    top: 0;
}

.navibar .logo{
    width:29%;
    float: left;
    cursor: pointer;
}

.navibar .logo img {
    width: 200px;
    margin-left:30px;
}


.navibar .links {
    width:45%;
    float:left;
    list-style:none;
    margin-top:10px;
}

.navibar .links li{
    padding:15px;
    float: left;
    margin-left: 80px;
}

.navibar .links li a {
    text-decoration: none;
    color:#F9DFFF;
    font-size: 18px;
    transition: 0.6s;
}

.navibar .links li a:hover{
    color:#f2f2f2;
}

.navibar .icon{
   
    float: right;
    cursor: pointer;
    text-align: right;
}
.navibar .icon img {
    width: 35px;
    height: 35px;
    margin: 7px 50px;
   background-color:#F9DFFF;
   border-radius: 40px;
   transition: all 0.6s ease-in-out;
   padding:6px 6px;
}

.navibar .icon img:hover{
    background-color:#fff;
}
  </style>
</head>
<body>
  <div class="navibar">
    <div class="logo">
      <img src="salanglayang.png" alt="Logo">
    </div>
    <ul class="links">
      <li><a href="MainPage.html">Home</a></li>
      <li><a href="movie 1.html">Showtimes</a></li>
      <li><a href="help.html">Help</a></li>
    </ul>
    <div class="icon">
      <a href="Profile.php">
        <img src="profile.png" alt="Profile">
      </a>
    </div>
  </div>
  <div class="container">
    <h1>Profile</h1>
    <?php
    // Connect to the database
    $link = mysqli_connect("localhost", "root", "", "salanglayang");
    if (!$link) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    // Retrieve customer information from the database
    $query = "SELECT * FROM customer";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
      // Check if any rows were returned
      if (mysqli_num_rows($result) > 0) {
        // Fetch the first row
        $row = mysqli_fetch_assoc($result);
        
        // Display the customer information
        echo "<p>Fullname: " . $row['Fullname'] . "</p>";
        echo "<p>Email: " . $row['Email'] . "</p>";
        echo "<p>Username: " . $row['Username'] . "</p>";
        echo "<p>Password: " . $row['Passwords'] . "</p>";
        
        // Add buttons to update email and password
        echo '<form method="post" action="">';
        echo '  <input type="email" name="email" placeholder="New Email">';
        echo '  <button type="submit" name="updateEmail">Update Email</button>';
        echo '</form>';

        echo '<form method="post" action="">';
        echo '  <input type="password" name="password" placeholder="New Password">';
        echo '  <button type="submit" name="updatePassword">Update Password</button>';
        echo '</form>';
      } else {
        echo "<p>No customer information found.</p>";
      }
    } else {
      echo "Error: " . mysqli_error($link);
    }

    // Handle the form submissions to update email and password
    if (isset($_POST['updateEmail'])) {
      $newEmail = $_POST['email'];
      $updateQuery = "UPDATE customer SET Email='$newEmail'";
      if (mysqli_query($link, $updateQuery)) {
        echo "<p>Email updated successfully.</p>";
      } else {
        echo "Error updating email: " . mysqli_error($link);
      }
    }

    if (isset($_POST['updatePassword'])) {
      $newPassword = $_POST['password'];
      $updateQuery = "UPDATE customer SET Passwords='$newPassword'";
      if (mysqli_query($link, $updateQuery)) {
        echo "<p>Password updated successfully.</p>";
      } else {
        echo "Error updating password: " . mysqli_error($link);
      }
    }

    // Close the connection to the database
    mysqli_close($link);
    ?>
  </div>
</body>
</html>
