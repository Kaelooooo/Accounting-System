<?php

	ob_start();
	session_start();
	include('database.php');

	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	$sql      = "SELECT * FROM pos_users WHERE username='$username' AND BINARY password='$password'";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	
	if($rows==1){
		$_SESSION['name']  = $row['firstname'].' '. $row['lastname'];
		$_SESSION['id']    = $row['user_id'];
		$_SESSION['role']    = $row['role'];
		if($row['role'] == 1){
		header("location:../accounts/index.php");
		} else {
		header("location:../accounts/orders.php");
		}
	} else { 
		$sql1      = "SELECT * FROM pos_customer WHERE username='$username' AND BINARY password='$password'";
		$result1   = mysqli_query($mysqli, $sql1);

		$row1      = mysqli_fetch_assoc($result1);
		$rows1	   = mysqli_num_rows($result1);
		if($rows1==1){
			
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			$transcode =  implode($pass);
	
			
			$_SESSION['name']  = $row1['firstname'].' '. $row1['lastname'];
			$_SESSION['id']    = $row1['customer_id'];
			$_SESSION['transcode']    = $transcode;
			
			header("location:../customer/menu.php");
		} else {
			header("location:../login.php?error");
		}
	}
