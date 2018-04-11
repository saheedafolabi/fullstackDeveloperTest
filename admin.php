<!DOCTYPE HTML>
<html>
<head>
<title>Admin | FULLSTACK DEVELOPER TEST</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="images/logo.png" rel="shortcut icon" />
</head>
<body>
<div class="container1">
<center><img src="images/pix1.png" id="pix"></center>
<form method="POST" enctype="multipart/form-data">
<?php require_once "connect.php";?>
<?php
session_start();
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username) or empty($password)){
			$msg = "Sorry! Username or password field is empty";
			}else{				
			$check_query = mysqli_query($con, "SELECT id FROM admin WHERE username = '".$username."' AND password = '".$password."'");
			if(mysqli_num_rows($check_query)== 1){
				$_SESSION['username'] = $username;
				header('location:dashboard.php');
			$msg = "Ok! Successfully logged in";
			}else{
				$msg = "Sorry! User doesn't exist";
			}
		}
		echo "<div class='box'>$msg</div>";
	}

?>
<center><h3>Username :</h3>
<input type="text" name="username" pattern="^[a-zA-Z0-9]+" placeholder="Username" required /><br />
<h3>Password :</h3>
<input type="password" name="password" pattern="^[a-zA-Z0-9]+" placeholder="*******" required /><br />
<input type="submit" name="submit" value="Login" /></center>
</form>

</div>
</body>
</html>