<!DOCTYPE HTML>
<html>
<head>
<title>Sign Up | FULLSTACK DEVELOPER TEST</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="images/logo.png" rel="shortcut icon" />
</head>
<body>
<?php require_once "connect.php";?>
<?php require_once "functions.php";?>
<?php require_once "header.php";?>

<div class="container">
<center><h1 style='color:#666'>Sign Up</h1></center>
<form method="POST" enctype="multipart/form-data">
<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username) or empty($password)){
			$msg = "Sorry! Username or password field is empty";
		}else{
			$check_query = mysqli_query($con, "SELECT id FROM users WHERE username = '".$username."'");
			if(mysqli_fetch_array($check_query) != 0){
				$msg = "Sorry! Users already exist";
			}else{				
			mysqli_query($con, "INSERT INTO users VALUES ('','".$username."','".md5($password)."')");
			$msg = "Ok! Successfully registered";
			}
			echo "<div class='box'>$msg</div>";
		}
	}

?>
<h3>Username :</h3>
<input type="text" name="username" pattern="^[a-zA-Z0-9]+" placeholder="Username" required /><br />
<h3>Password :</h3>
<input type="password" name="password" pattern="^[a-zA-Z0-9]+" placeholder="*******" required /><br />
<input type="submit" name="submit" value="Sign Up" />
</form>
</div>
</body>
</html>