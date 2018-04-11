<!DOCTYPE HTML>
<html>
<head>
<title>Profile | FULLSTACK DEVELOPER TEST</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="images/logo.png" rel="shortcut icon" />
</head>
<body>
<?php require_once "connect.php";?>
<?php require_once "functions.php";?>
<?php require_once "header.php";?>
<div class="container2">
<?php
error_reporting(0);
$mem_query = mysqli_query($con, "SELECT id FROM users");
while($row_query = mysqli_fetch_array($mem_query)){
	$user_id = $row_query['id'];
	$username = getuser($user_id, 'username');
}
	
	if(isset($_GET['user']) && !empty($_GET['user'])){
		$user = $_GET['user'];
	}else{
		$user = $_SESSION['user_id'];
	}
	$username = getuser($user, 'username');
?>
<h3> Welcome! <?php echo $username; ?></h3>
</div>
</body>
</html>