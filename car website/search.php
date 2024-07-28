<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Add your CSS styles here */
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }
      <style>
    /* Add awesome styles */
      form {
          width: 500px;
          margin: 50px auto;
          text-align: center;
          border: 1px solid lightgray;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 2px 2px 5px gray;
      }
      img {
        width: 200px;
        height: 150px;
      }
      
      <style>
      /* Add styles to search label */
    

      .search-label {
          font-size: 20px;
          margin-bottom: 10px;
      }

      #search {
          width: 60%;
          padding: 10px;
          margin: 10px 0;
          border-radius: 5px;
          border: 1px solid lightgray;
          box-shadow: 2px 2px 5px gray;
          font-size: 18px;
          text-align: center;
      }

      #search-button {
          width: 20%;
          padding: 10px;
          margin: 10px 0;
          border-radius: 5px;
          background-color: blue;
          color: white;
          border: none;
          cursor: pointer;
      }

      #search-button:hover {
          background-color: deepskyblue;
      }
    </style>

</style>


    </style>
  </head>
  <body>
    <form class="search-form" action="search.php" method="post">
      <label for="search">Search:</label>
      <input type="text" id="search" name="search">
      <input type="submit" id="search-btn" value="Submit">
    </form>
    <table>
      <tr>
        <th>VIN</th>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>Color</th>
        <th>Mileage</th>
        <th>Price</th>
        <th>Image</th>
      </tr>
      <?php
        // Connect to the database
        $db = mysqli_connect("localhost", "root", "", "vehicles");

        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Get the search string from the form
          $search = mysqli_real_escape_string($db, $_POST['search']);

          // Search for vehicles in the database
          $query = "SELECT * FROM detail WHERE VIN LIKE '%$search%' OR make LIKE '%$search%' OR model LIKE '%$search%' OR year LIKE '%$search%' OR color LIKE '%$search%' OR mileage LIKE '%$search%' OR price LIKE '%$search%'";
          $result = mysqli_query($db, $query);

          // Loop through the results and display them in a table
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['VIN'] . '</td>';
            echo '<td>' . $row['Make'] . '</td>';
            echo '<td>' . $row['Model'] . '</td>';
            echo '<td>' . $row['Year'] . '</td>';
            echo '<td>' . $row['Color'] . '</td>';
            echo '<td>' . $row['Mileage'] . '</td>';
            echo '<td>' . $row['Price'] . '</td>';
            echo '<td><img src="images/'. $row['image'] . '" alt="Vehicle Image"></td>';
            echo '</tr>';
          }
        }
      ?>
    </table>
