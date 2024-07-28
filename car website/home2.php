<!DOCTYPE html>
<html>
<head>
  <style>
    div{
        background-color: green;
        align-items: center;
    }

    div .product_edit{
        text-decoration: none;
        background-color: blue;
        padding: 10px;
        border-radius: 5px;
        font-weight: 600px;
        color: white;
    }
    
    table {
      width: 80%;
      margin: 0 auto;
      text-align: center;
      border-collapse: collapse;
    }
    th, td {
      border: 2px solid #ddd;
      padding: 8px;
    }
    td{
        height: 150px;
        align-items: center;
    }
    th {
      background-color: grey;
    }
    img {
      width: 200px;
      height: 150px;
    }
    .buttons {
      display: flex;
      justify-content: center;
    }
    .button {
      background-color: blue;
      color: white;
      border: 2px solid green;
      padding:  10px;
      text-decoration: none;
      margin: 8px;
      cursor: pointer;
      border-radius: 10px;
      /* height: 20%; */
      text-align: center;
      
    }
    h1{
        text-align: center;
    }
    .btnns{
        display: flex;
        flex-direction:row;
        justify-content:space-around;
    }


    a:hover {
    transform: translateY(-2px);
    box-shadow: 4px 4px 10px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
  <table>
  <div class="btnns">
    <h1 >VEHICLES </h1>
    <a class="product_edit" href="search.php">SEARCH</a>
    <a class="product_edit" href="addproduct.php">ADD VEHICLES</a>
  </div>
    <tr>
      <th>VIN</th>
      <th>Make</th>
      <th>Model</th>
      <th>Year</th>
      <th>Color</th>
      <th>Mileage</th>
      <th>Price</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
    <?php
     
      // Connect to the database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "vehicles";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Select all vehicles from the database
      $sql = "SELECT * FROM detail";
      $result = $conn->query($sql);

      // Output each vehicle
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["VIN"] . "</td>";
        echo "<td>" . $row["Make"] . "</td>";
        echo "<td>" . $row["Model"] . "</td>";
        echo "<td>" . $row["Year"] . "</td>";
        echo "<td>" . $row["Color"] . "</td>";
        echo "<td>" . $row["Mileage"] . "</td>";
        echo "<td>" . $row["Price"] . "</td>";
        echo "<td><img src='images/" . $row["image"] . "'></td>";
        echo "<td class='buttons'>";
        echo "<a class='button' href='updatepage.php?vin=" . $row["VIN"] . "'>Edit</a>";
        echo "<a class='button' href='delete.php?vin=" . $row["VIN"] . "'>Delete</a>";
        echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
        
