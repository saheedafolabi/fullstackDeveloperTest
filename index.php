<!DOCTYPE HTML>
<html>
<head>
<title>Home | FULLSTACK DEVELOPER TEST</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="images/logo.png" rel="shortcut icon" />
</head>
<body>
<?php require_once "connect.php";?>
<?php require_once "functions.php";?>
<?php require_once "header.php";?>
<div class="container2">
<div class="cont">
<?php
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
		echo "<div class='cont10'>";
		echo "<div class='cont15'>"; echo $row['title']; echo"</div>";
		echo "<div class='cont13'>"; echo "Posted on: "; echo $row['datetime']; echo"</div>";
		echo "<br>";	
		$decs = $row['text'];
		$strCut = substr($decs,0,230);
		$decs = substr($strCut,0,strrpos($strCut, ' ')).'...';
		echo "<div class='cont14'>"; echo $decs;
		echo "<a href='#'>Read more</a>"; echo"</div>";
		echo "<div class='cont12'>"; echo "<img src='images/".$row['image']."' height='230' width='250'/>";
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
<div>
</div>
</body>
</html>