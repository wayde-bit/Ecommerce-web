<?php
  // Connect to the database
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vehicles";


  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the VIN of the vehicle from the GET request
  $vehicle_vin = $_GET["vin"];

  // Delete the vehicle from the database
  $sql = "DELETE FROM detail WHERE vin='$vehicle_vin'";
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: home2.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>
