<?php
	require 'admin/dbcon.php';
	session_start(); 
	
	if(!ISSET($_SESSION['voters_id'])){
		header("location:index.php");
	}
	if(!ISSET($_SESSION['secret_voter_id'])){
		header("location:voter-login.php");
	}
	
	else{
		$session_id=$_SESSION['voters_id'];
		$user_query = $conn->query("SELECT * FROM user WHERE user_id = '$session_id'") or die(mysqli_error());
		$user_row = $user_query->fetch_array();
	}
?>