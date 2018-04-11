<!DOCTYPE HTML>
<html>
<head>
<title>Sign In | FULLSTACK DEVELOPER TEST</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="images/logo.png" rel="shortcut icon" />
</head>
<body>
<?php require_once "connect.php";?>
<?php require_once "functions.php";?>
<?php require_once "header.php";?>

<div class="container">
<center><h1 style='color:#666'>Sign In</h1></center>
<form method="POST" enctype="multipart/form-data">
<?php

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username) or empty($password)){
			$msg = "Sorry! Username or password field is empty";
			}else{				
			$check_query = mysqli_query($con, "SELECT id FROM users WHERE username = '".$username."' AND password = '".md5($password)."'");
			if(mysqli_num_rows($check_query)== 1){
				$get = mysqli_fetch_array($check_query);
				$user_id = $get['id'];
				$_SESSION['user_id'] = $user_id;
				header('location:index.php');
			$msg = "Ok! Successfully logged in";
			}else{
				$msg = "Sorry! User doesn't exist";
			}
		}
		echo "<div class='box'>$msg</div>";
	}

?>
<h3>Username :</h3>
<input type="text" name="username" pattern="^[a-zA-Z0-9]+" placeholder="Username" required /><br />
<h3>Password :</h3>
<input type="password" name="password" pattern="^[a-zA-Z0-9]+" placeholder="*******" required /><br />
<input type="submit" name="submit" value="Login" />
</form>
</div>
</body>
</html>