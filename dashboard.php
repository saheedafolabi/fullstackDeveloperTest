<!DOCTYPE HTML>
<html>
<head>
<title>Dashboard | FULLSTACK DEVELOPER TEST</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="images/logo.png" rel="shortcut icon" />
</head>
<body>
<header>
<ul>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="exit.php">Logout</a></li>			
</ul>
</header>
<div class="container2">
<center><h1 style='color:#666'>Welcome! Admin</h1></center>
<?php require_once "connect.php";?>
<?php
session_start();

?>
<div class="box1">
<form method="POST" enctype="multipart/form-data">
<input id="txt" type="text" name="title" placeholder="Enter title"/>
<textarea id="txt" name="text" placeholder="Write what in your mind here ..." cols="40" rows="3"></textarea><br />
<input id="txt" type="file" name="image"/>
<input id="btn" type="submit" name="submit" value="Post"/>
</form>
<?php

	if(isset($_POST['submit'])){
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$title = $_POST['title'];
		$text = $_POST['text'];
		$datetime = date("Y/m/d --- h:i:sa", time());
		mysqli_query($con, "INSERT INTO post VALUES ('','$title','$text','$image','$datetime')");
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
	}
	error_reporting(0);
$page = $_GET['page'];
if($page == '' || $page == 1){
	$page1 = '0';
}else{
	$page1 = ($page*8)-8;
}
	$res = mysqli_query($con, "SELECT * FROM post ORDER BY id DESC limit $page1,8");

	while($row = mysqli_fetch_array($res)){
echo "<br>";
		echo "<div class='cont9'>";  echo $row['title']; echo"</div>";
		echo "<div class='cont13'>"; echo "Posted on: "; echo $row['datetime']; echo"</div>";
		echo "<br>";		
		$decs = $row['text'];
		$strCut = substr($decs,0,230);
		$decs = substr($strCut,0,strrpos($strCut, ' ')).'...';
		echo "<div class='cont13'>"; echo $decs;
		echo "<a href='#'>Read more</a>";
		echo "<div class='cont12'>"; echo "<img src='images/".$row['image']."' height='90' width='80'/>";
		echo "<a href='edit.php?edit=$row[id]' class='box'>Edit</a>"; echo" | "; echo "<a href='delete.php?del=$row[id]' class='box'>Delete</a>";
		echo "</div>";
		echo "</div>";

	}
$res1 = mysqli_query($con, "SELECT id FROM post");
$count = mysqli_num_rows($res1);
$a = $count/8;
$a = ceil($a);
echo "<br/>";
for($b=1; $b<=$a; $b++){
	?><a href='index.php?page=<?php echo$b;?>' style='text-decoration:none' class='box'><?php echo $b.' ';?></a><?php
}
?>
</div>
</div>
</body>
</html>