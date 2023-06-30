<?php
include('../controller/database.php');


$customer = $mysqli->query("SELECT a.*, b.name as salesman from pos_customer a left join pos_salesman b on a.sm_id = b.sm_id ");

if(isset($_POST['add-customer'])){
	
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$address        = $_POST['address'];
	$contactnumber  = $_POST['contactnumber'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];
	$email          = $_POST['email'];

	$mysqli->query("INSERT INTO pos_customer (firstname , lastname ,address,contact,email,username,password )
	VALUES ('$fname','$lname','$address','$contactnumber','$email','$username','$password')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Customer Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}

if(isset($_POST['delete-customer'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_customer where customer_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Customer is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}

if(isset($_POST['update-customer'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$address        = $_POST['address'];
	$contactnumber  = $_POST['contactnumber'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];
	$email          = $_POST['email'];	
	$mysqli->query("UPDATE  pos_customer set firstname  ='$fname' ,
										 lastname  ='$lname' ,
										 address  ='$address' ,
										 email  ='$email' ,
										 username  ='$username' ,
										 password  ='$password' ,
										 contact  ='$contactnumber' 
										 WHERE customer_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Customer Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}