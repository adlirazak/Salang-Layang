<!DOCTYPE html>
<html>
<head>
  <title>Your Booked Tickets</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      text-align: center;
      position: inherit;
      margin-left: 0%;
    }

    th, td {
      border: 3px solid #ddd;
      padding: 20px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #6020BA;
      color: #fff;
      text-align: center;
    }

    button {
      background-color: #6020BA;
      color: white;
      border: none;
      padding: 6px 12px;
      cursor: pointer;
      border-radius: 30px;
   border-width: 20px;
    }

    .header .first {
      position: relative;
      margin-top: 200px;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }

    .container {
      width: 1250px;
      margin: auto;
    }

    .navibar {
      position: fixed;
      background: #6020BA;
      height: 60px;
      width: 100%;
      z-index: 9999;
      top: 0;
    }

    .navibar .logo {
      width: 29%;
      float: left;
      cursor: pointer;
    }

    .navibar .logo img {
      width: 200px;
    }

    .navibar .links {
      width: 45%;
      float: left;
      list-style: none;
      margin-top: 10px;
    }

    .navibar .links li {
      padding: 15px;
      float: left;
      margin-left: 80px;
    }

    .navibar .links li a {
      text-decoration: none;
      color: #F9DFFF;
      font-size: 18px;
      transition: 0.6s;
    }

    .navibar .links li a:hover {
      color: #f2f2f2;
    }

    .navibar .icon {
      float: right;
      cursor: pointer;
      text-align: right;
    }

    .navibar .icon img {
      width: 40px;
      height: 40px;
      margin: 12px 10px;
      background-color: #F9DFFF;
      border-radius: 20px;
      transition: all 0.6s ease-in-out;
      padding: 6px 6px;
    }

    .navibar .icon img:hover {
      background-color: #fff;
    }

    .header {
      background: #F9DFFF;
      height: 2000px;
      color: #6020BA;
      overflow: hidden;
    }

    ul.a {
      list-style-type: circle;
    }

    h1 {
      text-align: center;
      font-size: 30px;
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>
<body>
  
  <div class="navibar">
    <div class="container">
      <div class="logo">
        <img src="salanglayang.png">
      </div>
      <ul class="links">
        <li><a href="mainPage.html">Home </a></li>
        <li><a href="movie 1.html">Showtimes</a></li>
        <li><a href="help.html">Help</a></li>
      </ul>
      <div class="icon">
        <a href="profile.php">
          <img src="profile.png">
        </a>
      </div>
    </div>
  </div>
  <div class="header">
    <div class="first">
    <h1>Your Booked Tickets</h1>
      <table id="all">
        <thead>
          <tr>
            <th>Movie Name</th>
            <th>Seat</th>
            <th>Book Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // First, connect to the MySQL server.
$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Then, select the database.
mysqli_select_db($link, "salanglayang") or die(mysqli_error($link));
         // Retrieve data from the database
  $result = mysqli_query($link, "SELECT movie_name, seat, book_time FROM booking");

  // Check if the query was successful
  if ($result) {
    // Fetch rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['movie_name'] . '</td>';
      echo '<td>' . $row['seat'] . '</td>';
      echo '<td>' . $row['book_time'] . '</td>';
      echo '<td><button onclick="deleteRow(this)">Cancel Booking</button></td>';
      echo '</tr>';
    }
  } else {
    echo "Error: " . mysqli_error($link);
  }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!--header-->

  <script>
  function deleteRow(button) {
    // Traverse up the DOM to find the closest table row (tr)
    var row = button.closest('tr');
    // Get the movie name from the first column of the row
    var movieName = row.getElementsByTagName('td')[0].innerHTML;
    // Get the booking time from the third column of the row
    var bookTime = row.getElementsByTagName('td')[2].innerHTML;
    // Get the seat from the second column of the row
    var seat = row.getElementsByTagName('td')[1].innerHTML;

    // Send an AJAX request to delete the data
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // If the request is successful, remove the row from the table
        row.remove();
      }
    };
    xhr.send("movie_name=" + movieName + "&book_time=" + bookTime + "&seat=" + seat);
  }
</script>

</body>
</html>
