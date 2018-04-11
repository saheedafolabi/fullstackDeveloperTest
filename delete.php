<?php
require_once"connect.php";
	
	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$sql = mysqli_query($con, "DELETE FROM post WHERE id= '$id'");
		echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
	}
?>