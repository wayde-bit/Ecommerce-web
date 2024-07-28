<?php

?>


<!DOCTYPE html>
<head>
  <title>Contact Page</title><br>
  <style>
    /* Add your custom styles here */
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
	background: #21292c;
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
<form action="register.php" method="POST" class="form">
            <div class="box">
                <h2>CONTACT US PAGE</h2>
               <p>For inquiries and more information on a particular issue, You
                can reach us through the following platforms:
               </p>
            </div>
        </form> 
</body>
</html>
