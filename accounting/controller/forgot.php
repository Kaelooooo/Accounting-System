<?php

	ob_start();
	session_start();
	include('database.php');

		$email = mysqli_real_escape_string($mysqli,$_POST['email']);

		$sql1      = "SELECT * FROM pos_customer WHERE email='$email'";
		$result1   = mysqli_query($mysqli, $sql1);

		$row1      = mysqli_fetch_assoc($result1);
		$rows1	   = mysqli_num_rows($result1);
		if($rows1==1){
			
			
			$name  = $row1['firstname'].' '. $row1['lastname'];
			$password    = $row1['password'];
			
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host     = 'smtp.hostinger.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'admin@thepawdiumpetshop.com';
			$mail->Password = '@Programmer2013';
			$mail->SMTPSecure = 'ssl'; // tls
			$mail->Port     = 465; // 587
			$mail->setFrom('admin@thepawdiumpetshop.com', 'PAWDIUM');
			$mail->addAddress($email);
			$mail->Subject = 'Forgot Password';
			$mail->isHTML(true);


			$mail->Body = "<html>
								<body>
									<h1>Hello , " .$name ." </h1>
									<p>Your Password is : ". $password."</p>
								</body>
							</html>";

			if ($mail->send()) {
				$message = 'success';
			} else {
				$message = 'failed';
			}
			
			header("location:../forgot.php?success");
		} else {
			header("location:../forgot.php?error");
		}
