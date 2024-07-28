<?php

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "vehicles");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $username = $_POST['username'];
  $password = $_POST['password'];
   echo"$username,$password";
  // Check if the user exists in the database
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);

  // If the user exists, verify the password
  if ($user) {
    if ($password== $user['password']) {
      // Start a new session
      session_start();

      // Store the user ID in the session
      $_SESSION['user_id'] = $user['id'];
      // Redirect to the home page
      if ($user['id']==1){
       header("Location: home2.php");
      }else{
        header("Location: home.php");
      }
      exit;
    } else {
		echo "<script>alert('Incorrect username or password.');</script>";
    }
  } else {
    // Show an error message if the user doesn't exist
    echo "<script>alert('User not found');</script>";
  }
}

?>

<style>
    *{
	margin: 0px;
	padding: 0px;
	box-sizing: border-box;
	font-family: sans-serif;
}
body{
	display: flex;
	align-content: center;
	justify-content: center;
	min-height: 100vh;
	background-image: url('img 5.jpg');
    background-size: cover;
    background-position: center;
}
.form{
	width: 650px;
	height: 600px;
	border-radius: 20px;
	background: #141414;
	border: 3px solid blue;
	box-shadow: 0px 5px 10px 0px rgba(7, 220, 220), 1px 3px 4px 0px rgba(7, 220, 220)
}
.form:hover{
	border: 3px solid green;
	transition: 0.5s ease-in-out;
}
.box{
	margin-top: 20px;
	text-align: center;
	color: white;
}
input{
	margin: 16px auto;
	height: 40px;
	width: 350px;
	border-radius: 20px;
	border-bottom: 2px solid green;
	text-align: center;
	color: white;
	background: none;
	outline: rgb(53, 53, 163);
}
input[type="text"]:hover{
	border: 2px solid rgb(53, 53, 163);
	width: 230px;
	transition: 0.7s ease all;
}
input[type="password"]:hover{
	border: 2px solid rgb(53, 53, 163);
	width: 230px;
	transition: 0.7s ease all;
}
.btn{
	width: 120px;
	height: 40px;
	border-bottom: 5px solid green;
	background: none;
	color: white;
	font-size: 18px;
	border-radius: 20px;
}
.btn:hover{
	border: 2px solid rgb(199, 144, 78);
	transition: 0.5s ease;
}
  </style>
</head>
<body>
        <form action="login.php" method="POST" class="form">
            <div class="box"><br><br><br><br>
                <h2>LOGIN PAGE</h2><br><br>
                <input type="text" name= "username" placeholder="Enter Username"><br>
                <input type="password" name= "password" placeholder="Enter Password"><br><br>
                <button type="submit" class = "btn">LOGIN</button><br><br>
                <a href="register.php"> Do not have an account? Register</a>
            </div>
        </form> 
</body>
</html>
