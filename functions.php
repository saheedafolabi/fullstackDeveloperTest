<?php
session_start();
function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}

function getuser($id, $field){
	$con = mysqli_connect("localhost","root","","loginsystem");
	$mem = mysqli_query($con, "SELECT $field FROM users WHERE id = '$id'");
	$row = mysqli_fetch_array($mem);
	return $row[$field];
}

?>