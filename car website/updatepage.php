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

  // Get the id of the vehicle from the GET request
  $vehicle_id = $_GET["vin"];
  // Update the information of the vehicle in the database when the form is submitted
  if (isset($_POST["submit"])) {
    $make = $_POST["make"];
    $model = $_POST["model"];
    $year = $_POST["year"];
    $color = $_POST["color"];
    $mileage = $_POST["mileage"];
    $price = $_POST["price"];
   

    $sql = "UPDATE detail SET make='$make', model='$model', year='$year', color='$color', mileage='$mileage', price='$price' WHERE Vin='$vehicle_id'";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Record updated successfully')</script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
 
  }
   // Get the information of the vehicle from the database
   $sql = "SELECT * FROM detail WHERE Vin = '$vehicle_id'";
   $result = $conn->query($sql);
   $vehicle = $result->fetch_assoc();
?>
 <style>
  form {
    width: 500px;
    margin: 50px auto;
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 5px #ccc;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-top: 7px;
    font-size: 18px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 5px #ccc;
  }

  input[type="submit"] {
    width: 50%;
    padding: 10px;
    margin-top: 20px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>


<form action="" method="post">
  <h1>Edit Form</h1>
  <div>
  <label for="">Make</label>
  <input type="text" name="make" value="<?php echo $vehicle["Make"]; ?>">
  </div>
  <div>
  <label for="">Model</label>
  <input type="text" name="model" value="<?php echo $vehicle["Model"]; ?>">
  </div>
  <div>
  <label for="">Year</label>
  <input type="text" name="year" value="<?php echo $vehicle["Year"]; ?>">
  </div>
  <div>
  <label for="">Color</label>
  <input type="text" name="color" value="<?php echo $vehicle["Color"]; ?>">
  </div>
  <div>
  <label for="">Mileage</label>
  <input type="text" name="mileage" value="<?php echo $vehicle["Mileage"]; ?>">
  </div>
  <div>
  <label for="">Price</label>
  <input type="text" name="price" value="<?php echo $vehicle["Price"]; ?>">
  </div>
  <input type="submit" name="submit" value="Submit">
</form>
