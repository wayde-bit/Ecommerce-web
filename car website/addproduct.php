<?php

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "vehicles");

if (isset($_POST['submit'])) {
  // Retrieve form data
  $VIN = $_POST ['VIN'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $color = $_POST['color'];
  $mileage = $_POST['mileage'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];

  // Store the image on the server
  move_uploaded_file($_FILES['image']['tmp_name'], "$image");

  // Insert the vehicle information into the database
  $query = "INSERT INTO detail  (VIN, make, model, year, color, mileage, price, image) VALUES ('$VIN', '$make', '$model', '$year', '$color', '$mileage', '$price', '$image')";
  mysqli_query($db, $query);
  echo "<script>alert('Vehicle added successfully')</script>";
  // Redirect to the home page
  //header("Location: home.php");
  //exit;
}

?>
<style>
  form {
    width: 500px;
    margin: 50px auto;
    text-align: center;
    padding: 20px;
    border: 3px solid green;
	  box-shadow: 0px 5px 10px 0px rgba(7, 220, 220), 1px 3px 4px 0px rgba(7, 220, 220)
  }
  .form:hover{
    border: 3px solid green;
    transition: 0.5s ease-in-out;
}

  input[type="text"], input[type="file"] {
    /* width: 100%;
    padding: 10px;
    margin-top: 10px;
    font-size: 18px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 5px #ccc; */
    margin: 16px auto;
    height: 30px;
    width: 350px;
    border-radius: 20px;
    border-bottom: 2px solid green;
    text-align: center;
    color: black;
    background: none;
    outline: blue;
  }
  input[type="text"]:hover{
    border: 2px solid rgb(53, 53, 163);
    width: 230px;
    transition: 0.7s ease all;
}
  input[type="submit"] {
    width: 50%;
    padding: 10px;
    margin-top: 20px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 20px;
    border-bottom: 2px solid blue;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>

<form action="" method="post" enctype="multipart/form-data">
  <h1>Add vehicle Form</h1>
  <input type = "text" name = "VIN" placeholder="VIN">
  <input type="text" name="make" placeholder="Make">
  <input type="text" name="model" placeholder="Model">
  <input type="text" name="year" placeholder="Year">
  <input type="text" name="color" placeholder="Color">
  <input type="text" name="mileage" placeholder="Mileage">
  <input type="text" name="price" placeholder="Price">
  <input type="file" name="image">
  <input type="submit" name="submit" value="Submit">
</form>
