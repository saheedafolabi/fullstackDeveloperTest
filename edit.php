<!DOCTYPE HTML>
<html>
<head>
<title>Edit | FULLSTACK DEVELOPER TEST</title>
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
<?php
require_once "connect.php";
?>
<?php
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$res = mysqli_query($con, "SELECT * FROM post WHERE id ='$id'");
		$row = mysqli_fetch_array($res);
	}
	if(isset($_POST['newtitle'])){
		$id = $_POST['id'];
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$newtitle = $_POST['newtitle'];
		$newtext = $_POST['newtext'];
		$newdatetime = date("Y/m/d --- h:i:sa", time());
		$query = mysqli_query($con, "UPDATE `post` SET `title`= '$newtitle',`text`='$newtext',`image`='$image',`datetime`='$newdatetime' WHERE `id` = $id");
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
	echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
	}
?>
<div class="container2">
<div class="box1">
<form method="POST" enctype="multipart/form-data">
<input id="txt" type="hidden" name="id" value = "<?php echo $row['0']?>" /><br />
<input id="txt" type="text" name="newtitle" placeholder="Enter title"/><br />
<textarea id="txt" name="newtext" placeholder="Write what in your mind here ..." cols="40" rows="3" value = "<?php echo $row['newtext']?>"></textarea><br />
<input id="txt" type="file" name="image"/><br />
<input id="btn" type="submit" name="submit" value="Post"/>
</form>
</div>
</div>
</body>
</html>