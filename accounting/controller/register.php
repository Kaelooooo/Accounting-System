<?php
include('database.php');

	
	if(isset($_POST['create-account'])){
		$fname    = $_POST['fname'];
		$lname    = $_POST['lname'];
		$email    = $_POST['email'];
		$address  = $_POST['address'];
		$mobile   = $_POST['contact'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name     = $fname .' '.$lname;
		
		$check    = $mysqli->query("SELECT * from pos_customer where email='$email'");
		$count    = $check->num_rows;
		
		if($count !=0){
			echo "<script> window.location.href='register.php?username-duplicate'; </script>";
		} else {
			$check    = $mysqli->query("SELECT * from pos_customer where username='$username'");
			$count    = $check->num_rows;
			
		$mysqli->query("INSERT INTO pos_customer (firstname,lastname,email,address,username,password,contact) 
								VALUES ('$fname','$lname','$email','$address','$username','$password','$mobile')");
		echo "<script> window.location.href='login.php?registered'; </script>";
		
		
	}
	}
